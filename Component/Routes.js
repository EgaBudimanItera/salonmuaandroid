import React from "react";
import { createStackNavigator, createAppContainer } from "react-navigation";

import MenuUtama from "./MenuUtama";
import Login from "./Auth/Login";
import Registrasi from "./Auth/Registrasi";
import Informasi from "./Container/Informasi";
import MenuUtamaPelanggan from "./Pelanggan/MenuUtamaPelanggan";
import Rating from "./Pelanggan/Service/Rating";
import Pemesanan from "./Pelanggan/Pemesanan";
import DetailSalon from "./Pelanggan/DetailSalon";
import PilihService from "./Pelanggan/Service/PilihService";
import DetailKonsultasi from "./Pelanggan/DetailKonsultasi";
import Images from "./Images";
import DetailRating from "./Pelanggan/Service/DetailRating";
import Pesan from "./Pelanggan/Pesan";
import MapsPelanggan from "./Pelanggan/MapsPelanggan";
import DetailPesanan from "./Pelanggan/DetailPesanan";
import GalerySalon from "./Pelanggan/GalerySalon";
import FotoMakeup from "./Pelanggan/FotoMakeup";

import Maps from "./Maps";

//Salon

import MenuUtamaSalon from "./Salon/MenuUtamaSalon";
import PemesananSalon from "./Salon/PemesananSalon";
import JenisJasa from "./Salon/JenisJasa";
import Laporan from "./Salon/Laporan";
import TambahJasa from "./Salon/TambahJasa";
import DetailPemesananSalon from "./Salon/DetailPesananSalon";
import EditJasa from "./Salon/EditJasa";
import FotoSalon from "./Salon/FotoSalon";
import FotoMakeupSalon from "./Salon/FotoMakeupSalon";
import EditProfil from "./Salon/EditProfil";
import EditGalerySalon from "./Salon/EditGalery";

const Routes = createStackNavigator(
  {
    MenuUtama: {
      screen: MenuUtama
    },
    Login: {
      screen: Login
    },
    Registrasi: {
      screen: Registrasi
    },
    Informasi: {
      screen: Informasi
    },
    MenuUtamaPelanggan: {
      screen: MenuUtamaPelanggan
    },
    Rating: {
      screen: Rating
    },
    Pemesanan: {
      screen: Pemesanan
    },
    DetailSalon: {
      screen: DetailSalon
    },
    PilihService: {
      screen: PilihService
    },
    DetailKonsultasi: {
      screen: DetailKonsultasi
    },
    DetailRating: {
      screen: DetailRating
    },
    Maps: {
      screen: Maps
    },
    Pesan: {
      screen: Pesan
    },
    MapsPelanggan: {
      screen: MapsPelanggan
    },
    DetailPesanan: DetailPesanan,
    MenuUtamaSalon: MenuUtamaSalon,
    PemesananSalon: PemesananSalon,
    JenisJasa: JenisJasa,
    Laporan: Laporan,
    TambahJasa: TambahJasa,
    DetailPemesananSalon: DetailPemesananSalon,
    EditJasa: EditJasa,
    GalerySalon: GalerySalon,
    FotoMakeup: FotoMakeup,
    FotoSalon: FotoSalon,
    FotoMakeupSalon: FotoMakeupSalon,
    EditProfil: EditProfil,
    EditGalerySalon: EditGalerySalon
  },
  {
    initialRouteName: "MenuUtama"
  }
);

export default createAppContainer(Routes);
