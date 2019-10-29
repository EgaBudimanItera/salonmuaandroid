import React, { Component } from "react";
import { View, Text } from "react-native";
var id_salon = "";
var nama = "";
var alamat = "";
var foto = "";
var no_telp = "";
import ImageSlider from "react-native-image-slider";
import axios from "axios";
import Server from "../Server";
import { connect } from "react-redux";

var image = [];

class GalerySalon extends Component {
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

  constructor() {
    super();
    this.state = {
      galery: []
    };
  }

  getData = () => {
    axios
      .get(Server + `api.php?operasi=get_galery&data=${id_salon}`)
      .then(res => {
        this.setState({
          galery: res.data
        });
      });
  };

  componentDidMount() {
    this.getData();
    image = [];
  }

  render() {
    if (this.state.galery.length === 0) {
      return (
        <View style={{ flex: 1 }}>
          <Text style={{ textAlign: "center", marginTop: 20 }}>
            Tidak Ada Foto Galery Dari Salon
          </Text>
        </View>
      );
    }
    return (
      <View style={{ flex: 1 }}>
        <Text style={{ textAlign: "center", margin: 20 }}>
          Galery Foto Salon
        </Text>
        {this.state.galery.map(data => {
          image.push(Server + "images/" + data.foto_galeri);
        })}
        <ImageSlider images={image} />
      </View>
    );
  }
}
mapStateToProps = state => {
  return {
    id_admin: state.loginReducer
  };
};

export default connect(mapStateToProps)(GalerySalon);
