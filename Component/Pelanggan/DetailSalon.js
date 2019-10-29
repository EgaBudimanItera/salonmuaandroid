import React, { Component } from "react";
import { View, TouchableOpacity, Image, Dimensions } from "react-native";

import HeaderPelanggan from "./HeaderPelanggan";
const haversine = require("haversine");
import {
  Container,
  Header,
  Content,
  List,
  ListItem,
  Thumbnail,
  Text,
  Button,
  Icon,
  Left,
  Body,
  Card,
  CardItem,
  Right,
  Item,
  Picker,
  Form,
  Fab
} from "native-base";

import DatePicker from "react-native-datepicker";

import DateTimePicker from "react-native-modal-datetime-picker";

import axios from "axios";
import Server from "../Server";

import Spinner from "react-native-loading-spinner-overlay";
var Locale = require("react-native-locale");

var id_salon = "";
var nama = "";
var alamat = "";
var foto = "";
var no_telp = "";
var distance = 0;
var totalHarga = "";
var comHarga = "";
var hargaJasa = "";
var lat_sekarang = "";
var lng_sekarang = "";

import getDirections from "react-native-google-maps-directions";

import { withNavigation } from "react-navigation";

import { connect } from "react-redux";

function currencyFormat(num) {
  return num.toFixed(0).replace(/(\d)(?=(\d{3})+(?!\d))/g, "$1,");
}

class DetailSalon extends Component {
  static navigationOptions = ({ navigation }) => {
    id_salon = navigation.getParam("id_salon");
    nama = navigation.getParam("nama");
    alamat = navigation.getParam("alamat");
    foto = navigation.getParam("foto");
    no_telp = navigation.getParam("no_telp");

    return {
      title: nama
    };
  };
  constructor(props) {
    super(props);
    this.state = {
      dataSalon: [],
      jasaMakeup: undefined,
      status: "Datang Ke Rumah",
      isDateTimePickerVisible: false,
      chosenDate: "",
      jam: "",
      detailSalon: [],
      error: null,
      spinner: false,
      lat_user: null,
      lng_user: null,
      biaya: 0,
      biaya_trans: 0
    };
  }
  onValuejasaMakeup(value: string) {
    this.setState({
      jasaMakeup: value
    });

    //  console.log(value);
    this.getDetailSalon(value);
  }

  onValueStatus(value: string) {
    this.setState({
      status: value
    });
  }

  getDataSalon = () => {
    axios
      .get(Server + `api.php?operasi=show_jenis_jasasalon&data=${id_salon}`)
      .then(res => {
        this.setState({
          dataSalon: res.data
        });
      });
  };

  handleGetDirections = () => {
    {
      this.state.dataSalon.map(data => {
        lat_sekarang = data.lat;
        lng_sekarang = data.lng;
      });
    }
    navigator.geolocation.getCurrentPosition(position => {
      const data = {
        source: {
          latitude: position.coords.latitude,
          longitude: position.coords.longitude
        },
        destination: {
          latitude: parseFloat(lat_sekarang),
          longitude: parseFloat(lng_sekarang)
        },
        params: [
          {
            key: "travelmode",
            value: "driving" // may be "walking", "bicycling" or "transit" as well
          },
          {
            key: "dir_action",
            value: "navigate" // this instantly initializes navigation using the given travel mode
          }
        ]
      };
      getDirections(data);
    });
  };

  getDetailSalon = jasa => {
    axios
      .get(
        Server +
          `api.php?operasi=show_detailsalon&data=${id_salon}&jasa=${jasa}`
      )
      .then(res => {
        this.setState({
          detailSalon: res.data
        });
      })
      .then(() => {
        navigator.geolocation.getCurrentPosition(
          position => {
            //this.getData("", position.coords.latitude, position.coords.longitude);
            console.log(position.coords.latitude, position.coords.longitude);
            var lat_salon = null;
            var lng_salon = null;
            var lat_user = position.coords.latitude;
            var lng_salon = position.coords.longitude;

            {
              this.state.detailSalon.map(data => {
                lat_salon = data.lat;
                lng_salon = data.lng;
              });
            }

            const start = {
              latitude: position.coords.latitude,
              longitude: position.coords.longitude
            };

            const end = {
              latitude: lat_salon,
              longitude: lng_salon
            };

            //console.log(lat_salon);
            //  this.jarakTerdekat();

            distance = haversine(start, end, { unit: "meter" });

            comHarga = distance / 1000;

            if (Math.round(comHarga) < 4) {
              totalHarga = 20000 + hargaJasa * 0.1;
            } else {
              totalHarga = 4000 * Math.round(comHarga) + hargaJasa * 0.1;
            }

            this.setState({
              lat_user: position.coords.latitude,
              lng_user: position.coords.longitude
            });
          },
          error => this.setState({ error: error.message }),
          { enableHighAccuracy: false, timeout: 200000, maximumAge: 1000 }
        );
      });
  };

  showDateTimePicker = () => {
    this.setState({ isDateTimePickerVisible: true });
  };

  hideDateTimePicker = () => {
    this.setState({ isDateTimePickerVisible: false });
  };

  handleDatePicked = time => {
    this.setState({
      jam: time
    });
    //  alert(time);
    this.hideDateTimePicker();
  };

  pesanSalon() {
    if (totalHarga === "") {
      alert("Silahkan Tunggu Sedang Mencari Biaya Transportasi");
    } else if (this.state.chosenDate === "") {
      alert("Silahkan Pilih Tanggal");
    } else if (this.state.jam === "") {
      alert("Silahkan Pilih Jam");
    } else {
      console.log(
        "tanggal" +
          this.state.chosenDate +
          " id_jenis_jasa" +
          this.state.jasaMakeup +
          " id_pendaftar = " +
          this.props.id_admin.id_admin +
          "harga jasa = " +
          hargaJasa +
          " jumlah_harga = " +
          (parseInt(hargaJasa) + parseInt(totalHarga)) +
          "lat user = " +
          this.state.lat_user +
          "lng User = " +
          this.state.lng_user +
          " Status " +
          this.state.status +
          "biaya transportasi = " +
          totalHarga +
          "jam = " +
          this.state.jam.toString().substr(15, 9)
      );

      var compareHarga = "";
      if (this.state.status === "Datang Ke Tempat") {
        compareHarga = hargaJasa;
        totalHarga = 0;
      } else {
        compareHarga = parseInt(hargaJasa) + parseInt(totalHarga);
      }

      axios
        .get(
          Server +
            `api.php?operasi=input_pesanan&tanggal=${this.state.chosenDate}
    &id_jenisjasa=${this.state.jasaMakeup}
    &id_pendaftar=${this.props.id_admin.id_admin}
    &harga=${hargaJasa}
    &jml_harga=${compareHarga}
    &lat_user=${this.state.lat_user}
    &lng_user=${this.state.lng_user}
    &status=${this.state.status}
    &biaya_transportasi=${totalHarga}
    &jam=${this.state.jam.toString().substr(15, 9)}`
        )
        .then(() => {
          alert("Pesanan Anda Berhasil Terkirim");
          this.props.navigation.navigate("MenuUtamaPelanggan");
        });
    }
  }

  componentDidMount() {
    this.getDataSalon();
  }

  biaya = data => {
    Locale.decimalStyle(data).then(response => {
      this.setState({
        biaya: response
      });
    });
  };

  render() {
    return (
      <View style={{ flex: 1 }}>
        <View style={{ flex: 1 }}>
          <Content>
            <List>
              <ListItem thumbnail>
                <Left>
                  <Thumbnail
                    square
                    source={{ uri: Server + "images/" + foto }}
                  />
                </Left>
                <Body>
                  <Text>{nama}</Text>
                  <TouchableOpacity onPress={this.handleGetDirections}>
                    <Text style={{ color: "red" }} note numberOfLines={1}>
                      {alamat}
                    </Text>
                  </TouchableOpacity>
                  <Text note numberOfLines={1}>
                    ( {no_telp} )
                  </Text>
                </Body>
              </ListItem>
            </List>

            <Form>
              <View
                style={{
                  flexDirection: "row",
                  paddingLeft: 10,
                  paddingTop: 20
                }}
              >
                <Text style={{ flex: 1 }}> Jasa Makeup </Text>
                <Item picker style={{ flex: 1.8 }}>
                  <Picker
                    mode="dropdown"
                    style={{ width: 190, height: 20 }}
                    placeholderStyle={{ color: "#bfc6ea" }}
                    placeholderIconColor="#007aff"
                    selectedValue={this.state.jasaMakeup}
                    onValueChange={this.onValuejasaMakeup.bind(this)}
                  >
                    {this.state.dataSalon.map((data, key) => {
                      return (
                        <Picker.Item
                          key={key}
                          label={data.jasa}
                          value={data.id_jenis}
                        />
                      );
                    })}
                  </Picker>
                </Item>
              </View>
              <View
                style={{
                  marginTop: 10,
                  marginHorizontal: 15,
                  backgroundColor: "#949494",
                  height: 1
                }}
              />
              <Text style={{ paddingLeft: 15, paddingTop: 10, color: "blue" }}>
                Keterangan (Include) :
              </Text>

              {this.state.detailSalon.map((data, key) => {
                // console.log(data);
                hargaJasa = data.harga;
                totalHarga = totalHarga + hargaJasa * 0.1;
                return (
                  <View key={key}>
                    <Text style={{ paddingLeft: 15, paddingTop: 5 }}>
                      {data.keterangan}
                    </Text>
                    <View
                      style={{
                        marginTop: 10,
                        marginHorizontal: 15,
                        backgroundColor: "#949494",
                        height: 1
                      }}
                    />
                    <View
                      style={{
                        flexDirection: "row",
                        paddingLeft: 10,
                        paddingTop: 20
                      }}
                    >
                      <Text style={{ flex: 1, paddingLeft: 5 }}>Biaya </Text>
                      <Text style={{ flex: 1.8 }}>
                        : Rp. {currencyFormat(parseFloat(data.harga))}
                      </Text>
                    </View>

                    <View
                      style={{
                        marginTop: 10,
                        marginHorizontal: 15,
                        backgroundColor: "#949494",
                        height: 1
                      }}
                    />
                  </View>
                );
              })}

              <View
                style={{
                  flexDirection: "row",
                  paddingLeft: 10,
                  paddingTop: 20
                }}
              >
                <Text style={{ flex: 1 }}> Kategori Layanan </Text>
                <View style={{ flex: 1.8 }}>
                  <Item picker>
                    <Picker
                      mode="dropdown"
                      style={{ width: 190, height: 20 }}
                      placeholderStyle={{ color: "#bfc6ea" }}
                      placeholderIconColor="#007aff"
                      selectedValue={this.state.status}
                      onValueChange={this.onValueStatus.bind(this)}
                    >
                      <Picker.Item
                        label="Datang Ke Rumah"
                        value="Datang Ke Rumah"
                      />

                      <Picker.Item
                        label="Datang Ke Tempat"
                        value="Datang Ke Tempat"
                      />
                    </Picker>
                  </Item>
                  <Text style={{ fontSize: 10, color: "#a2a2a2" }}>
                    Note : Pelanggan Yang Datang = Free{" "}
                  </Text>
                </View>
              </View>
              <View
                style={{
                  marginTop: 10,
                  marginHorizontal: 15,
                  backgroundColor: "#949494",
                  height: 1
                }}
              />
              <View
                style={{
                  flexDirection: "row",
                  paddingTop: 20,
                  paddingLeft: 10
                }}
              >
                <View>
                  <Text style={{ flex: 1, paddingLeft: 5 }}>
                    Biaya Transportasi
                  </Text>

                  <Text
                    style={{ flex: 1, fontSize: 10, paddingLeft: 5 }}
                    note
                    numberOfLines={1}
                  >
                    Estimasi Jarak : {Math.round(comHarga)} Km
                  </Text>
                </View>
                {this.state.lat_user === null && (
                  <Text style={{ flex: 1.8, fontSize: 14, color: "blue" }}>
                    {" "}
                    : Mencari Estimasi Biaya Transportasi
                  </Text>
                )}
                {this.state.lat_user !== null && (
                  <Text style={{ flex: 1.8, color: "blue" }}>
                    : Rp. {currencyFormat(parseFloat(totalHarga))}
                  </Text>
                )}
              </View>

              <View
                style={{
                  marginTop: 10,
                  marginHorizontal: 15,
                  backgroundColor: "#949494",
                  height: 1
                }}
              />
              <View
                style={{
                  flexDirection: "row",
                  paddingLeft: 10,
                  paddingTop: 20
                }}
              >
                <Text style={{ flex: 1, paddingLeft: 5 }}>Tanggal</Text>
                <View style={{ flex: 1.8 }}>
                  <DatePicker
                    style={{ flex: 1 }}
                    date={this.state.chosenDate} //initial date from state
                    mode="date" //The enum of date, datetime and time
                    format="DD-MM-YYYY"
                    confirmBtnText="Confirm"
                    cancelBtnText="Cancel"
                    customStyles={{
                      dateIcon: {
                        position: "absolute",
                        left: 0,
                        top: 4,
                        marginLeft: 10
                      },
                      dateInput: {
                        marginLeft: 46,
                        borderRadius: 20
                      }
                    }}
                    onDateChange={date => {
                      this.setState({ chosenDate: date });
                    }}
                  />
                </View>
              </View>
              <View
                style={{
                  marginTop: 10,
                  marginHorizontal: 15,
                  backgroundColor: "#949494",
                  height: 1
                }}
              />
              <View
                style={{
                  flexDirection: "row",
                  paddingLeft: 10,
                  paddingTop: 20
                }}
              >
                <Text style={{ flex: 1, paddingLeft: 5 }}>Jam</Text>
                <View style={{ flex: 1.8 }}>
                  <Button
                    style={{ marginBottom: 10, height: 40, marginRight: 15 }}
                    bordered
                    info
                    onPress={this.showDateTimePicker}
                  >
                    <Text>
                      Pilih Jam {this.state.jam.toString().substr(15, 9)}
                    </Text>
                  </Button>

                  <DateTimePicker
                    mode="time"
                    isVisible={this.state.isDateTimePickerVisible}
                    onConfirm={this.handleDatePicked}
                    onCancel={this.hideDateTimePicker}
                  />
                </View>
              </View>
            </Form>
            <Button
              full
              info
              onPress={this.pesanSalon.bind(this)}
              style={{
                marginLeft: 10,
                marginBottom: 10,
                marginRight: 10,
                borderRadius: 10
              }}
            >
              <Text>Pesan Sekarang</Text>
            </Button>
          </Content>
          <Fab
            direction="up"
            containerStyle={{}}
            style={{ backgroundColor: "#fff" }}
            position="bottomRight"
            onPress={() => {
              this.props.navigation.navigate("GalerySalon", {
                id_salon: id_salon,
                nama: nama,
                alamat: alamat,
                foto: foto,

                no_telp: no_telp
              });
            }}
          >
            <Icon style={{ fontSize: 29, color: "#5067FF" }} name="md-images" />
          </Fab>
        </View>
      </View>
    );
  }
}
mapStateToProps = state => {
  return {
    id_admin: state.loginReducer
  };
};

export default connect(mapStateToProps)(withNavigation(DetailSalon));
