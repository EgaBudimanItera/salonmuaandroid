import React, { Component } from "react";

import {
  View,
  StatusBar,
  ScrollView,
  Dimensions,
  Text,
  PermissionsAndroid
} from "react-native";
import { Tab, Tabs } from 'native-base';
import Headers from "./Container/Headers";
import ImageSlider from "react-native-image-slider";
import Mua from "./Mua";
import Salon from "./Salon";
import AsyncStorage from "@react-native-community/async-storage";
import { connect } from "react-redux";

export async function request_camera_permission() {
  try {
    const granted = await PermissionsAndroid.request(
      PermissionsAndroid.PERMISSIONS.CAMERA
    );
    if (granted === PermissionsAndroid.RESULTS.GRANTED) {
    } else {
      Alert.alert("Camera Permission Not Granted");
    }
  } catch (err) {
    console.warn(err);
  }
}
export async function request_file_permission() {
  try {
    const granted = await PermissionsAndroid.request(
      PermissionsAndroid.PERMISSIONS.WRITE_EXTERNAL_STORAGE
    );
    if (granted === PermissionsAndroid.RESULTS.GRANTED) {
    } else {
      Alert.alert("File Permission Not Granted");
    }
  } catch (err) {
    console.warn(err);
  }
}

export async function request_location_permission() {
  try {
    const granted = await PermissionsAndroid.request(
      PermissionsAndroid.PERMISSIONS.ACCESS_FINE_LOCATION
    );
    if (granted === PermissionsAndroid.RESULTS.GRANTED) {
    } else {
      Alert.alert("Location Permission Not Granted");
    }
  } catch (err) {
    console.warn(err);
  }
}

class MenuUtama extends Component {
  static navigationOptions = { header: null };

  _retrieveData = async () => {
    try {
      id_user = JSON.parse(await AsyncStorage.getItem("id_user"));
      level = JSON.parse(await AsyncStorage.getItem("level"));
      if (id_user !== null) {
        // We have data!!
        console.log(level);
        this.props.dispatch({
          type: "TES_ACTION",
          payload: id_user
        });
        if (level === "salon") {
          this.props.navigation.navigate("MenuUtamaSalon", {
            level: "salon"
          });
        } else if (level === "pelanggan") {
          this.props.navigation.navigate("Rating", {
            level: "pelanggan"
          });
        }
      }
    } catch (error) {
      // Error retrieving data
    }
  };

  async componentDidMount() {
    await request_camera_permission();
    await request_location_permission();
    await request_file_permission();

    this._retrieveData();
    //await request_courseLocation_permission();
  }

  render() {
    return (
      <View style={{ flex: 1 }}>
        <View style={{ flex: 1 }}>
          <StatusBar backgroundColor="#04b96d" barStyle="light-content" />
          <Headers style={{ height: 10 }} menu="Login" men="Login" />
          <View
            style={{
              backgroundColor: "#001167",
              height: 2,
              marginVertical: 10,
              marginHorizontal: 2
            }}
          />
        </View>

        <View style={{ flex: 2 }}>
          <Tabs>
            <Tab heading="Salon">
              <Salon />
            </Tab>
            <Tab heading="Makeup Artis">
              <Mua />
            </Tab>
          </Tabs>
        </View>
      </View>
    );
  }
}
const mapsStateToProps = state => ({
  tes: state.loginReducer
});

export default connect(mapsStateToProps)(MenuUtama);
