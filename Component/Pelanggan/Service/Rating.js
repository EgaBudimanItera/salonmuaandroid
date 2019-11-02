import React, { Component } from "react";
import {
  View,
  TouchableOpacity,
  ActivityIndicator,
  Dimensions
} from "react-native";

import HeaderPelanggan from "../HeaderPelanggan";

import StarRating from "react-native-star-rating";

import {
  Container,
  Header,
  Content,
  Card,
  CardItem,
  Text,
  Icon,
  Body,
  Button,
  Thumbnail,
  Right,
  Item,
  Tab, Tabs,
  Input
} from "native-base";

import axios from "axios";
import Server from "../../Server";

import { withNavigation } from "react-navigation";

class Rating extends Component {
  static navigationOptions = ({ navigation }) => {
    return {
      header: null
    };
  };
  constructor(props) {
    super(props);
    this.state = {
      dataRating: [],
      dataRatingMua: []
    };
  }

  getDatarating = data => {
    axios.get(Server + `api.php?operasi=show_rating&data=${data}&kategori=salon`).then(res => {
      this.setState({
        dataRating: res.data
      });
    });
  };

  getDataratingMua = data => {
    axios.get(Server + `api.php?operasi=show_rating&data=${data}&kategori=mua`).then(res => {
      this.setState({
        dataRatingMua: res.data
      });
    });
  };

  componentDidMount() {
    this.getDatarating("");
    this.getDataratingMua("");
  }

  render() {
    // if (this.state.dataRating.length === 0) {
    //   return (
    //     <View
    //       style={{
    //         flex: 1,
    //         alignItems: "center",
    //         marginTop: Dimensions.get("window").height / 3.5
    //       }}
    //     >
    //       <Text style={{ textAlign: "center" }}>Loading ... </Text>

    //       <ActivityIndicator
    //         style={{ marginTop: 20 }}
    //         size="large"
    //         color="#0000ff"
    //       />
    //     </View>
    //   );
    // }
    return (
      <View style={{ flex: 1 }}>
        <View style={{ flex: 1 }}>
          <HeaderPelanggan />
        </View>
        <View style={{ flex: 2.6 }}>
          <Tabs>
            <Tab heading="Salon">
              <Item style={{ margin: 5 }}>
                <Input
                  onChangeText={e => {
                    this.getDatarating(e);
                  }}
                  placeholder="Masukan Pencarian"
                />
                <Icon active name="md-search" />
              </Item>
              <Content>
                {this.state.dataRating.map((data, key) => {
                  var ratings = 0;
                  if (data.jumlah_rating === null) {
                    ratings = 0.0;
                  } else {
                    ratings = parseFloat(data.jumlah_rating);
                  }
                  return (
                    <TouchableOpacity
                      activeOpacity={0.8}
                      key={key}
                      onPress={() => {
                        this.props.navigation.navigate("DetailRating", {
                          id_salon: data.id_salon,
                          nama: data.nama
                        });
                      }}
                    >
                      <Card>
                        <CardItem>
                          <Thumbnail
                            source={{ uri: Server + "images/" + data.foto }}
                          />
                          <Body>
                            <Text style={{ marginLeft: 5 }}>{data.nama}</Text>
                            <Text note style={{ marginLeft: 5 }}>
                              {data.alamat}
                            </Text>
                          </Body>
                          <Right>
                            <StarRating
                              disabled={true}
                              maxStars={5}
                              starSize={21}
                              fullStarColor={"orange"}
                              rating={ratings}
                            />
                          </Right>
                        </CardItem>
                      </Card>
                    </TouchableOpacity>
                  );
                })}
              </Content>
            </Tab>
            <Tab heading="Makeup Artis">
              <Item style={{ margin: 5 }}>
                <Input
                  onChangeText={e => {
                    this.getDataratingMua(e);
                  }}
                  placeholder="Masukan Pencarian"
                />
                <Icon active name="md-search" />
              </Item>
              <Content>
                {this.state.dataRatingMua.map((data, key) => {
                  var ratings = 0;
                  if (data.jumlah_rating === null) {
                    ratings = 0.0;
                  } else {
                    ratings = parseFloat(data.jumlah_rating);
                  }
                  return (
                    <TouchableOpacity
                      activeOpacity={0.8}
                      key={key}
                      onPress={() => {
                        this.props.navigation.navigate("DetailRating", {
                          id_salon: data.id_salon,
                          nama: data.nama
                        });
                      }}
                    >
                      <Card>
                        <CardItem>
                          <Thumbnail
                            source={{ uri: Server + "images/" + data.foto }}
                          />
                          <Body>
                            <Text style={{ marginLeft: 5 }}>{data.nama}</Text>
                            <Text note style={{ marginLeft: 5 }}>
                              {data.alamat}
                            </Text>
                          </Body>
                          <Right>
                            <StarRating
                              disabled={true}
                              maxStars={5}
                              starSize={21}
                              fullStarColor={"orange"}
                              rating={ratings}
                            />
                          </Right>
                        </CardItem>
                      </Card>
                    </TouchableOpacity>
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
export default withNavigation(Rating);
