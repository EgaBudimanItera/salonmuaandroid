import React, { Component } from "react";

import { View, Text, Image, Dimensions, ActivityIndicator } from "react-native";
import HeaderSalon from "./HeaderSalon";
import { connect } from "react-redux";
import axios from "axios";
import Server from "../Server";
import { Fab, Icon } from "native-base";

import { withNavigation } from "react-navigation";

var level = "";
class MenuUtamaSalon extends Component {
  static navigationOptions = ({ navigation }) => {
    level = navigation.getParam("level");

    return {
      header: null
    };
  };

  constructor(props) {
    super(props);
    this.state = {
      data_salon: [],
      loading: false
    };
  }

  getData = () => {
    axios
      .get(
        Server +
          `api.php?operasi=detail_salon&data=${this.props.id_admin.id_admin}`
      )
      .then(respon => {
        this.setState({
          data_salon: respon.data,
          loading: false
        });
      });
  };

  componentDidMount() {
    this.setState({loading: true})
    this.getData();
  }

  render() {
    if(this.state.loading) {
      return (
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
      );
    } else {
      return (
        <View style={{ flex: 1 }}>
          <View style={{ flex: 1 }}>
            <HeaderSalon />
          </View>
          <View
            style={{
              marginVertical: 10,
              height: 1,
              backgroundColor: "#000",
              width: "95%",
              marginLeft: 10
            }}
          />
          <View style={{ flex: 2.7 }}>
            <Text style={{ fontSize: 19, textAlign: "center" }}>
              Selamat Datang
            </Text>
            {this.state.data_salon.map((data, key) => {
              return (
                <View key={key}>
                  <Text style={{ textAlign: "center", fontSize: 20 }}>
                    {data.nama}
                  </Text>
                  <View
                    style={{
                      marginVertical: 20,
                      height: 1,
                      backgroundColor: "#000",
                      width: "95%",
                      marginLeft: 10
                    }}
                  />
                  <Image
                    resizeMode="contain"
                    style={{ height: 340, width: "100%" }}
                    source={{ uri: Server + "images/" + data.foto }}
                  />
                </View>
              );
            })}
          </View>
          <Fab
            direction="up"
            containerStyle={{}}
            style={{ backgroundColor: "#3c94f1" }}
            position="bottomRight"
            onPress={() => {
              this.props.navigation.navigate("EditProfil");
            }}
          >
            <Icon style={{ fontSize: 29, color: "#fff" }} name="ios-contact" />
          </Fab>
        </View>
      );
    }
  }
}

mapStateToProps = state => {
  return {
    id_admin: state.loginReducer
  };
};

export default connect(mapStateToProps)(withNavigation(MenuUtamaSalon));
