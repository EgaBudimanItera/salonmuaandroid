import React, { Component } from "react";

import { View, Dimensions, ActivityIndicator } from "react-native";

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
      DataKonfirmasi: [],
      loading: false,
      loadingKonfirmasi: false
    };
  }

  getData = () => {
    axios
      .get(
        Server +
          `api.php?operasi=pemesanan_salon&data=${this.props.id_admin.id_admin}&status=Proses`
      )
      .then(respon => {
        this.setState({
          Data:respon.data,
          loading: false
        });
      });
  };

  getDataKonfirmasi = () => {
    console.log( Server +
      `api.php?operasi=pemesanan_salon&data=${this.props.id_admin.id_admin}&status=Proses`)
    axios
      .get(
        Server +
          `api.php?operasi=pemesanan_salon&data=${this.props.id_admin.id_admin}&status=Pesanan Di Konfirmasi Salon`
      )
      .then(respon => {
        console.log(respon.data);
        this.setState({
          DataKonfirmasi: respon.data,
          loadingKonfirmasi: false
        });
      });
  };

  componentDidMount() {
    this.setState({ loading: true, loadingKonfirmasi: true })
    this.getData();
    this.getDataKonfirmasi();
  }

  // renderPesananProses = (resp) => {
  //   return 
  // }

  render() {
    console.log(this.state.Data)
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
                  {
                    this.state.loading ? (
                      <View
                        style={{
                          flex: 1,
                          alignItems: "center",
                          marginTop: Dimensions.get("window").height / 3.5
                        }}
                      >
                        <Text style={{textAlign: "center"}}>Silahkan Tunggu </Text>
              
                        <ActivityIndicator
                          style={{ marginTop: 20 }}
                          size="large"
                          color="#0000ff"
                        />
                      </View>
                    ) : (
                      Object.keys(this.state.Data).map((val, i) => {
                        return (  
                          <List key={i}>                           
                            <ListItem itemDivider>
                              <Text key={i} style={{ fontWeight: "bold", color: "black"}}> Tanggal {val}</Text>
                            </ListItem> 
                            {
                              this.state.Data[val].map((data, key) => {
                                return (                   
                                  <ListItem avatar key={key+i}>
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
                                )
                              })
                            }
                          </List>     
                        )
                      })
                    )
                  }
                </Content>
              </Tab>
              <Tab heading="Status Konfrimasi">
                <Content>
                  {
                    this.state.loadingKonfirmasi ? (
                      <View
                        style={{
                          flex: 1,
                          alignItems: "center",
                          marginTop: Dimensions.get("window").height / 3.5
                        }}
                      >
                        <Text style={{textAlign: "center"}}>Silahkan Tunggu </Text>
              
                        <ActivityIndicator
                          style={{ marginTop: 20 }}
                          size="large"
                          color="#0000ff"
                        />
                      </View>
                    ) : (
                      Object.keys(this.state.DataKonfirmasi).map((val, i) => {
                        return (  
                          <List key={i}>                           
                            <ListItem itemDivider>
                              <Text key={i} style={{ fontWeight: "bold", color: "black"}}> Tanggal {val}</Text>
                            </ListItem> 
                            {
                              this.state.DataKonfirmasi[val].map((data, key) => {
                                return (                   
                                  <ListItem avatar key={key+i}>
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
                                )
                              })
                            }
                          </List>     
                        )
                      })
                    )
                  }
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
