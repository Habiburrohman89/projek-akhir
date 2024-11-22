
import { StyleSheet, Text, View, Image, ScrollView } from 'react-native';


import { HelloWave } from '@/components/HelloWave';
import ParallaxScrollView from '@/components/ParallaxScrollView';
import { ThemedText } from '@/components/ThemedText';
import { ThemedView } from '@/components/ThemedView';

export default function HomeScreen() {
  return (
    <ScrollView style={styles.container}>
      {/* Header */}
      <View style={styles.header}>
        <Text style={styles.headerText}>Nama Sekolah</Text>
      </View>

      {/* Banner */}
      <View style={styles.banner}>
        <View style={styles.bannerOverlay}>
          <Text style={styles.bannerTitle}>Selamat Datang di Sekolah Kami</Text>
          <Text style={styles.bannerSubtitle}>Pendidikan berkualitas untuk masa depan gemilang</Text>
        </View>
      </View>

      {/* Informasi Utama */}
      <View style={styles.infoSection}>
        <View style={styles.infoBox}>
          <Text style={styles.infoTitle}>Visi & Misi</Text>
          <Text style={styles.infoText}>Menjadi sekolah terbaik dengan mencetak generasi cerdas dan berkarakter.</Text>
        </View>

        <View style={styles.infoBox}>
          <Text style={styles.infoTitle}>Berita Terbaru</Text>
          <Text style={styles.infoText}>1. Pendaftaran siswa baru telah dibuka</Text>
          <Text style={styles.infoText}>2. Upacara hari kemerdekaan 17 Agustus</Text>
          <Text style={styles.infoText}>3. Workshop untuk guru dan tenaga pendidik</Text>
        </View>

        <View style={styles.infoBox}>
          <Text style={styles.infoTitle}>Agenda Kegiatan</Text>
          <Text style={styles.infoText}>Jadwal kegiatan sekolah yang akan datang.</Text>
        </View>
      </View>

      {/* Footer */}
      <View style={styles.footer}>
        <Text style={styles.footerText}>Alamat Sekolah: Jalan Pendidikan No. 123, Kota ABC</Text>
        <Text style={styles.footerText}>Email: info@sekolah.com | Telepon: (021) 123-4567</Text>
      </View>
    </ScrollView>


  );
}

const styles = StyleSheet.create({
  container: {
    flex: 1,
    backgroundColor: '#fff',
  },
  header: {
    backgroundColor: '#004080',
    padding: 20,
    alignItems: 'center',
    flexDirection: 'row',
  },
  logo: {
    width: 40,
    height: 40,
    marginRight: 10,
  },
  headerText: {
    color: '#fff',
    fontSize: 18,
    fontWeight: 'bold',
  },
  banner: {
    position: 'relative',
    height: 200,
  },
  bannerImage: {
    width: '100%',
    height: '100%',
  },
  bannerOverlay: {
    position: 'absolute',
    top: 0,
    left: 0,
    right: 0,
    bottom: 0,
    backgroundColor: 'rgba(0, 0, 0, 0.4)',
    justifyContent: 'center',
    alignItems: 'center',
  },
  bannerTitle: {
    color: '#fff',
    fontSize: 22,
    fontWeight: 'bold',
  },
  bannerSubtitle: {
    color: '#fff',
    fontSize: 16,
  },
  infoSection: {
    padding: 20,
  },
  infoBox: {
    marginBottom: 15,
    padding: 15,
    backgroundColor: '#f8f8f8',
    borderRadius: 8,
    shadowColor: '#000',
    shadowOpacity: 0.1,
    shadowOffset: { width: 0, height: 2 },
    shadowRadius: 4,
    elevation: 3,
  },
  infoTitle: {
    fontSize: 18,
    fontWeight: 'bold',
    marginBottom: 5,
  },
  infoText: {
    fontSize: 14,
    color: '#333',
  },
  footer: {
    backgroundColor: '#004080',
    padding: 15,
    alignItems: 'center',
  },
  footerText: {
    color: '#fff',
    fontSize: 14,
    textAlign: 'center',
  },
});
  
