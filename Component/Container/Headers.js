import React, { Component } from "react";
import { View, Text, StyleSheet, TouchableOpacity } from "react-native";

import { Thumbnail, Content } from "native-base";
import { withNavigation } from "react-navigation";

class Headers extends Component {
  render() {
    return (
      <View style={styles.container}>
        <Text
          style={{
            textAlign: "center",
            marginVertical: 20,
            fontSize: 19,
            color: "#561eb8"
          }}
        >
          SIG Pemesanan Jasa MUA
        </Text>
        <View
          style={{
            backgroundColor: "#001167",
            height: 2,
            width: 280,
            marginVertical: 5
          }}
        />
        <View style={{ flex: 1, flexDirection: "row" }}>
          <Content horizontal>
            <TouchableOpacity
              onPress={() => {
                this.props.navigation.navigate("MenuUtama");
              }}
            >
              <View style={styles.menu}>
                <Thumbnail
                  style={{ width: 50, height: 50 }}
                  source={require("../../assets/home.png")}
                />
                <View style={styles.garisHeader} />
                <Text style={{ fontSize: 14 }}>Home</Text>
              </View>
            </TouchableOpacity>

            <TouchableOpacity
              onPress={() => {
                this.props.navigation.navigate("Maps");
              }}
            >
              <View style={styles.menu}>
                <Thumbnail
                  style={{ width: 50, height: 50 }}
                  source={require("../../assets/info.png")}
                />
                <View style={styles.garisHeader} />
                <Text style={{ fontSize: 14 }}>Informasi</Text>
              </View>
            </TouchableOpacity>

            <TouchableOpacity
              onPress={() => {
                this.props.navigation.navigate("Registrasi");
              }}
            >
              <View style={styles.menu}>
                <Thumbnail
                  style={{ width: 50, height: 50 }}
                  source={require("../../assets/registrasi.png")}
                />
                <View style={styles.garisHeader} />
                <Text style={{ fontSize: 14 }}>Registrasi</Text>
              </View>
            </TouchableOpacity>
            <TouchableOpacity
              onPress={() => {
                this.props.navigation.navigate("Login");
              }}
            >
              <View style={styles.menu}>
                <Thumbnail
                  style={{ width: 50, height: 50 }}
                  source={require("../../assets/login.png")}
                />
                <View style={styles.garisHeader} />
                <Text style={{ fontSize: 14 }}>Login</Text>
              </View>
            </TouchableOpacity>
          </Content>
        </View>
      </View>
    );
  }
}

export default withNavigation(Headers);

const styles = StyleSheet.create({
  container: {
    flex: 1,
    alignItems: "center"
  },
  menu: {
    height: 110,
    flex: 1,
    justifyContent: "center",
    alignItems: "center",
    margin: 10
  },
  garisHeader: {
    backgroundColor: "#001167",
    height: 2,
    width: 60,
    marginVertical: 5
  }
});
