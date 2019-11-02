import React, { Component } from "react";
import { connect } from "react-redux";

import Server from "../Server";
import axios from "axios";

import HeaderToko from "./HeaderSalon";
import { View, WebView, Alert } from "react-native";

import {
  Container,
  Content,
  Item,
  Text,
  Label,
  Button,
  Icon
} from "native-base";

import DatePicker from "react-native-datepicker";

import AndroidWebView from "react-native-webview-file-upload-android";


class Laporan extends Component {
  static navigationOptions = ({ navigation }) => {
    return {
      header: null
    };
  };
  constructor(props) {
    super(props);
    //set value in state for initial date
    this.state = { date: "", date2: "", download: 1 };
  }

  bersih = () => {
    this.setState({
      date: "",
      date2: ""
    });
  };

  downloaddata() {
    if (this.state.date === "" || this.state.date2 === "") {
      alert("Silahkan Pilih Periode Laporan");
    } else {
      this.setState({
        download: 2
      });
      Alert.alert(
        "Laporan",
        "Laporan Berhasil DI Download",
        [
          {
            text: "Yes",
            onPress: () => this.props.navigation.navigate("MenuUtamaSalon")
          },
          {
            text: "No",
            onPress: () => this.props.navigation.navigate("MenuUtamaSalon"),
            style: "cancel"
          }
        ],
        { cancelable: false }
        //clicking out side of alert will not cancel
      );
    }
  }

  render() {
    return (
      <View style={{ flex: 1 }}>
        <View style={{ flex: 1 }}>
          <HeaderToko />
        </View>
        <Container style={{ flex: 2 }}>
          <Text style={{ margin: 10 }}> Laporan </Text>

          <Content>
            <Item style={{ margin: 5 }}>
              <DatePicker
                style={{ flex: 1 }}
                date={this.state.date} //initial date from state
                mode="date" //The enum of date, datetime and time
                placeholder="Dari Tanggal"
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
                  this.setState({ date: date });
                }}
              />
            </Item>
            <Label style={{ marginVertical: 20, textAlign: "center" }}>
              Sampai Tanggal
            </Label>
            <Item style={{ margin: 5 }}>
              <DatePicker
                style={{ flex: 1 }}
                date={this.state.date2} //initial date from state
                mode="date" //The enum of date, datetime and time
                placeholder="Sampai Tanggal"
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
                  this.setState({ date2: date });
                }}
              />
            </Item>

            <Button
              iconLeft
              info
              block
              style={{ marginTop: 20 }}
              onPress={this.downloaddata.bind(this)}
            >
              <Icon name="print" />
              <Text>Cetak Laporan</Text>
            </Button>
            {
              this.state.download === 2 && (
              <AndroidWebView
                source={{
                  uri:
                    Server +
                    "cetak.php?dari=" +
                    this.state.date +
                    "&sampai=" +
                    this.state.date2 +
                    "&id_salon=" +
                    this.props.Reducerdata.id_admin
                }}
              />
            )}
          </Content>
        </Container>
      </View>
    );
  }
}

const mapStateToProps = state => ({
  Reducerdata: state.loginReducer
});

export default connect(mapStateToProps)(Laporan);
