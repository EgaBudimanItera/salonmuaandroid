import React, { Component } from "react";

import { Image, View, TouchableOpacity, ActivityIndicator, Dimensions } from "react-native";
import {
  Container,
  Header,
  Content,
  Card,
  CardItem,
  Thumbnail,
  Text,
  Button,
  Icon,
  Left,
  Body,
  Fab,
  Right
} from "native-base";
import axios from "axios";
import Server from "../Server";
import { connect } from "react-redux";
import HeaderSalon from "./HeaderSalon";
class FotoSalon extends Component {
  static navigationOptions = ({ navigation }) => {
    return {
      header: null
    };
  };
  constructor(props) {
    super(props);
    this.state = {
      dataSalon: [],
      loading: false
    };
  }
  getDataSalon = () => {
    axios
      .get(
        Server +
          `api.php?operasi=get_galery&data=${this.props.id_admin.id_admin}`
      )
      .then(res => {
        this.setState({
          dataSalon: res.data,
          loading: false
        });
      });
  };

  componentDidMount() {
    this.setState({ loading: true })
    this.getDataSalon();
  }

  render() {
    return (
      <View style={{ flex: 1 }}>
        <View style={{ height: 180 }}>
          <HeaderSalon />
        </View>
        <View style={{ flex: 2 }}>
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
              this.state.dataSalon.map((data, key) => {
              return (
                <Card key={key}>
                  <CardItem cardBody>
                    <Image
                      source={{ uri: Server + "images/" + data.foto_galeri }}
                      style={{ height: 200, width: null, flex: 1 }}
                    />
                  </CardItem>
                  <View
                    style={{
                      alignContent: "center",
                      justifyContent: "center",
                      alignItems: "center"
                    }}
                  >
                    <TouchableOpacity
                      style={{
                        marginVertical: 10,
                        width: "40%",
                        backgroundColor: "#00BCD4",
                        borderRadius: 7,
                        height: 30
                      }}
                      info
                      onPress={() => {
                        this.props.navigation.navigate("EditGalerySalon", {
                          id_galery: data.id_galeri,
                          foto: data.foto_galeri
                        });
                      }}
                    >
                      <Text
                        style={{
                          textAlign: "center",
                          color: "#fff",
                          paddingTop: 5
                        }}
                      >
                        Edit Galery
                      </Text>
                    </TouchableOpacity>
                  </View>
                </Card>    
                        )
                      })
                    )
                  }
          </Content>
        </View>
        <Fab
          direction="up"
          containerStyle={{}}
          style={{ backgroundColor: "#fff" }}
          position="bottomRight"
          onPress={() => {
            this.props.navigation.navigate("FotoMakeupSalon");
          }}
        >
          <Icon style={{ fontSize: 29, color: "#5067FF" }} name="md-add" />
        </Fab>
      </View>
    );
  }
}

mapStateToProps = state => {
  return {
    id_admin: state.loginReducer
  };
};

export default connect(mapStateToProps)(FotoSalon);
