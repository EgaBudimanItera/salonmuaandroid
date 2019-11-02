import React, { Component } from "react";

import { View } from "react-native";

import {
  Content,
  List,
  ListItem,
  Left,
  Body,
  Right,
  Thumbnail,
  Text,
  Button,
  Tabs,
  Icon,
  H3,
  Tab
} from "native-base";

import HeaderSalon from "./HeaderSalon";
import { connect } from "react-redux";
import axios from "axios";
import Server from "../Server";

class PemesananSalon extends Component {
  static navigationOptions = ({ navigation }) => {
    return {
      header: null
    };
  };

  constructor(props) {
    super(props);
    this.state = {
      Data: [],
      DataKonfirmasi: []
    };
  }

  getData = () => {
    axios
      .get(
        Server +
          `api.php?operasi=pemesanan_salon&data=${this.props.id_admin.id_admin}&status=Proses`
      )
      .then(respon => {
        console.log(respon.data);
        this.setState({
          Data: respon.data
        });
      });
  };

  getDataKonfirmasi = () => {
    axios
      .get(
        Server +
          `api.php?operasi=pemesanan_salon&data=${this.props.id_admin.id_admin}&status=Pesanan Di Konfirmasi Salon`
      )
      .then(respon => {
        console.log(respon.data);
        this.setState({
          DataKonfirmasi: respon.data
        });
      });
  };

  componentDidMount() {
    this.getData();
    this.getDataKonfirmasi();
  }

  render() {
    // if (this.state.Data.length === 0) {
    //   return (
    //     <View style={{ flex: 1 }}>
    //       <View style={{ flex: 1 }}>
    //         <HeaderSalon />
    //       </View>
    //       <View style={{ flex: 2 }}>
    //         <Text>Tidak Ada Data Pemesanan</Text>
    //       </View>
    //     </View>
    //   );
    // }
    return (
      <View style={{ flex: 1 }}>
        <View style={{ flex: 1 }}>
          <HeaderSalon />
        </View>
        <View style={{ flex: 3 }}>
          <Text style={{textAlign:"center", paddingBottom: 5}}>Daftar Pemesan</Text>
          <Tabs>
            <Tab heading="Status Proses">
              <Content>
                {this.state.Data.map((data, key) => {
                  return (
                    <List key={key}>
                      <ListItem avatar>
                        <Left>
                          <Thumbnail
                            source={{ uri: Server + "images/" + data.foto }}
                          />
                        </Left>
                        <Body>
                          <Text>{data.nama}</Text>
                          <Text note>{data.alamat}</Text>

                          <View style={{ flex: 1, flexDirection: 'row', alignItems: 'center'}}>
                            <Icon style={{ fontSize: 13, color: "blue", textAlign: "left"}} name="calendar"/>
                            <Text style={{ fontSize: 13, color: "blue"}}> {data.tanggal}</Text>
                            <Text style={{ fontSize: 13, color: "blue", textAlign: "right"}}> {data.jam}</Text>
                          </View>
                        </Body>
                        <Right>
                          <Button
                            transparent
                            onPress={() => {
                              this.props.navigation.navigate(
                                "DetailPemesananSalon",
                                {
                                  id_order: data.id_order
                                }
                              );
                            }}
                          >
                            <Text style={{ color: "#000" }}>Detail</Text>
                          </Button>
                        </Right>
                      </ListItem>
                    </List>
                  );
                })}
              </Content>
            </Tab>
            <Tab heading="Status Konfrimasi">
              <Content>
                {this.state.DataKonfirmasi.map((data, key) => {
                  return (
                    <List key={key}>
                      <ListItem avatar>
                        <Left>
                          <Thumbnail
                            source={{ uri: Server + "images/" + data.foto }}
                          />
                        </Left>
                        <Body>
                          <Text>{data.nama}</Text>
                          <Text note>{data.alamat}</Text>
                          
                          <View style={{ flex: 1, flexDirection: 'row', alignItems: 'center'}}>
                            <Icon style={{ fontSize: 13, color: "blue", textAlign: "left"}} name="calendar"/>
                            <Text style={{ fontSize: 13, color: "blue"}}> {data.tanggal}</Text>
                            <Text style={{ fontSize: 13, color: "blue", textAlign: "right"}}> {data.jam}</Text>
                          </View>
                        </Body>
                        <Right>
                          <Button
                            transparent
                            onPress={() => {
                              this.props.navigation.navigate(
                                "DetailPemesananSalon",
                                {
                                  id_order: data.id_order
                                }
                              );
                            }}
                          >
                            <Text style={{ color: "#000" }}>Detail</Text>
                          </Button>
                        </Right>
                      </ListItem>
                    </List>
                  );
                })}
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

export default connect(mapStateToProps)(PemesananSalon);
