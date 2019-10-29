import React, { Component } from "react";
import { Text, View } from "react-native";
import MenuUtama from "../MenuUtama";
import HeaderPelanggan from "./HeaderPelanggan";
import Salon from "./Salon";
import { Content, Container } from "native-base";

var level = 0;
export default class MenuUtamaPelanggan extends Component {
  static navigationOptions = ({ navigation }) => {
    level = navigation.getParam("level");

    return {
      header: null
    };
  };
  constructor(props) {
    super(props);
  }
  login() {
    this.props.navigation.navigate("MenuUtama");
  }
  render() {
    return (
      <View style={{ flex: 1 }}>
        <View style={{ flex: 1 }}>
          <HeaderPelanggan />
        </View>
        <View style={{ flex: 2.5 }}>
          <Container>
            <Salon />
          </Container>
        </View>
      </View>
    );
  }
}
