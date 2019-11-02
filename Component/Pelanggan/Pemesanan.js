import React, { Component } from "react";
import {
  View,
  TouchableOpacity,
  ActivityIndicator,
  Dimensions
} from "react-native";

import HeaderPelanggan from "./HeaderPelanggan";
import { connect } from "react-redux";

import {
  Container,
  Header,
  Content,
  Card,
  CardItem,
  Text,
  Icon,
  Thumbnail,
  Right,
  List,
  Item,
  ListItem,
  Left,
  Body,
  Input,
  Tabs,
  Tab,
  Button
} from "native-base";

import axios from "axios";
import Server from "../Server";

import { withNavigation } from "react-navigation";

class Pemesanan extends Component {
  static navigationOptions = ({ navigation }) => {
    return {
      header: null
    };
  };
  constructor(props) {
    super(props);
    this.state = {
      dataPemesanan: [],
      dataPemesananKonfirmasi: []
    };
  }

  getData = () => {
    axios
      .get(
        Server +
          `api.php?operasi=show_historipesanan&data=${this.props.id_admin.id_admin}&status=Proses`
      )
      .then(respon => {
        this.setState({
          dataPemesanan: respon.data
        });
      });
  };

  getDataKonfirmasi = () => {
    axios
      .get(
        Server +
          `api.php?operasi=show_historipesanan&data=${this.props.id_admin.id_admin}&status=Pesanan Di Konfirmasi Salon`
      )
      .then(respon => {
        this.setState({
          dataPemesananKonfirmasi: respon.data
        });
      });
  };

  componentDidMount() {
    this.getData();
    this.getDataKonfirmasi();
  }

  render() {
    if (this.state.dataPemesanan.length === 0) {
      return (
        <View
          style={{
            flex: 1
          }}
        >
          <View style={{ flex: 1 }}>
            <HeaderPelanggan />
          </View>
          <View style={{ flex: 2 }}>
            <View style={{ height: 1, backgroundColor: "#177ddb" }} />
            <Text style={{ textAlign: "center", marginTop: 10 }}>
              Anda Belum Mempunyai Pesanan
            </Text>
          </View>
        </View>
      );
    }
    return (
      <View style={{ flex: 1 }}>
        <View style={{ flex: 1 }}>
          <HeaderPelanggan />
        </View>
        <View style={{ flex: 3 }}>
          <Text style={{textAlign:"center", paddingBottom: 5}}>Daftar Pemesan</Text>
          <Tabs>
            <Tab heading="Status Proses">
              <Content>
                <List>
                  {this.state.dataPemesanan.map((data, key) => {
                    return (
                      <ListItem thumbnail key={key}>
                        <Left>
                          <Thumbnail
                            square
                            source={{ uri: Server + "images/" + data.foto_jenis }}
                          />
                        </Left>
                        <Body>
                          <Text>{data.jasa}</Text>
                          <Text note numberOfLines={1}>
                            {data.nama}
                          </Text>
                          <Text note numberOfLines={1}>
                            {data.alamat}
                          </Text>
                          <Text note numberOfLines={1}>
                            {data.tanggal}
                          </Text>
                        </Body>
                        <Right>
                          <Button
                            transparent
                            onPress={() => {
                              this.props.navigation.navigate("DetailPesanan", {
                                id_order: data.id_order
                              });
                            }}
                          >
                            <Text>Lihat Pesanan</Text>
                          </Button>
                        </Right>
                      </ListItem>
                    );
                  })}
                </List>
              </Content>
            </Tab>
            <Tab heading="Status Konfrimasi">
              <Content>
                <List>
                  {this.state.dataPemesananKonfirmasi.map((data, key) => {
                    return (
                      <ListItem thumbnail key={key}>
                        <Left>
                          <Thumbnail
                            square
                            source={{ uri: Server + "images/" + data.foto_jenis }}
                          />
                        </Left>
                        <Body>
                          <Text>{data.jasa}</Text>
                          <Text note numberOfLines={1}>
                            {data.nama}
                          </Text>
                          <Text note numberOfLines={1}>
                            {data.alamat}
                          </Text>
                          <Text note numberOfLines={1}>
                            {data.tanggal}
                          </Text>
                        </Body>
                        <Right>
                          <Button
                            transparent
                            onPress={() => {
                              this.props.navigation.navigate("DetailPesanan", {
                                id_order: data.id_order
                              });
                            }}
                          >
                            <Text>Lihat Pesanan</Text>
                          </Button>
                        </Right>
                      </ListItem>
                    );
                  })}
                </List>
              </Content>
            </Tab>
          </Tabs>
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

export default connect(mapStateToProps)(withNavigation(Pemesanan));
