import React, { Component } from "react";
import { View } from "react-native";
import {
  Container,
  Content,
  Form,
  Item,
  Label,
  Input,
  Button,
  Tab,
  Tabs,
  TabHeading,
  Icon,
  Text
} from "native-base";
import Headers from "../Container/Headers";
import RegistrasiSalon from "./RegistrasiSalon";
import RegistrasiPelanggan from "./RegistrasiPelanggan";

export default class Registrasi extends Component {
  static navigationOptions = { header: null };
  render() {
    return (
      <View style={{ flex: 1 }}>
        <Container style={{ flex: 1.1 }}>
          <Content>
            <Headers menu="Login" men="Login" />
          </Content>
        </Container>

        <Container style={{ flex: 2 }}>
          <Tabs>
            <Tab
              heading={
                <TabHeading>
                  <Text>Registrasi Salon</Text>
                </TabHeading>
              }
            >
              <RegistrasiSalon />
            </Tab>
            <Tab
              heading={
                <TabHeading>
                  <Text>Registrasi Pelanggan</Text>
                </TabHeading>
              }
            >
              <RegistrasiPelanggan />
            </Tab>
          </Tabs>
        </Container>
      </View>
    );
  }
}
