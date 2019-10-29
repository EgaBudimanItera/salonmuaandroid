import React, { Component } from "react";
import { View, Text, StyleSheet, Image, TouchableOpacity } from "react-native";
import { Content, Container, Item, Input, Icon } from "native-base";

import { withNavigation } from "react-navigation";
import axios from "axios";
import Server from "../Server";

class Salon extends Component {
  constructor() {
    super();
    this.state = {
      dataSalon: []
    };
  }

  getDataSalon = data => {
    axios.get(Server + `api.php?operasi=salon&data=${data}`).then(res => {
      this.setState({
        dataSalon: res.data
      });
    });
  };

  componentDidMount() {
    this.getDataSalon("");
  }

  render() {
    return (
      <Container style={{ flex: 2 }}>
        <Item style={{ margin: 5 }}>
          <Input
            onChangeText={e => {
              this.getDataSalon(e);
            }}
            placeholder="Masukan Pencarian"
          />
          <Icon active name="md-search" />
        </Item>
        <Content>
          <View style={styles.buttom}>
            {this.state.dataSalon.map((data, key) => {
              return (
                <TouchableOpacity
                  key={key}
                  style={styles.buttomItem}
                  onPress={() => {
                    this.props.navigation.navigate("DetailSalon", {
                      id_salon: data.id_salon,
                      nama: data.nama,
                      alamat: data.alamat,
                      foto: data.foto,

                      no_telp: data.no_telp
                    });
                  }}
                >
                  <View style={styles.buttomItemIner}>
                    <Image
                      source={{ uri: Server + "images/" + data.foto }}
                      style={styles.image}
                    />
                    <Text style={{ textAlign: "center", marginTop: 10 }}>
                      {data.nama}
                    </Text>
                  </View>
                </TouchableOpacity>
              );
            })}
          </View>
        </Content>
      </Container>
    );
  }
}

export default withNavigation(Salon);

const styles = StyleSheet.create({
  container: {
    flex: 1,
    alignItems: "center"
  },
  buttom: {
    height: "100%",
    backgroundColor: "#ffffff",
    flexDirection: "row",
    flexWrap: "wrap",
    padding: 5
  },
  buttomItem: {
    padding: 20,
    width: "50%"
  },
  buttomItemIner: {
    flex: 1,
    alignItems: "center",
    width: 100
  },
  image: {
    height: 100,
    borderRadius: 20,

    width: 100
  }
});
