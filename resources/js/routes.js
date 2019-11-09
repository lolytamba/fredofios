import App from './components/App'
import Home from './components/Home'
import Spa from './components/Spa'
import Base from './components/Base'
import Kontak from './components/Kontak'
import TentangSekolah from './components/TentangSekolah'
import Autisme from './components/Autisme'
import Galeri from './components/Galeri'
import Staff from './components/Staff'
import Berita from './components/Berita1'
import Berita2 from './components/Berita2'
import Berita3 from './components/Berita3'
import Fasilitas from './components/Fasilitas'
import Akademik from './components/Akademik'
import NonAkademik from './components/NonAkademik'

export const routes = [
    {
      path: '/',
      name: 'base',
      component: Base,
    },
    {
      path: '/spa',
      name: 'spa',
      component: Spa,
      children: [
        {
          path: 'home',
          name: 'home',
          component: Home,
        },
        {
          path: 'kontak',
          name: 'kontak',
          component: Kontak,
        },
        {
          path: 'sekolah',
          name: 'sekolah',
          component: TentangSekolah,
        },
        {
          path: 'autisme',
          name: 'autisme',
          component: Autisme,
        },
        {
          path: 'galeri',
          name: 'galeri',
          component: Galeri,
        },
        {
          path: 'staff',
          name: 'staff',
          component: Staff,
        },
        {
          path: 'home/berita1',
          name: 'berita1',
          component: Berita,
        },
        {
          path: 'home/berita2',
          name: 'berita2',
          component: Berita2,
        },
        {
          path: 'home/berita3',
          name: 'berita3',
          component: Berita3,
        },
        {
          path: 'fasilitas',
          name: 'fasilitas',
          component: Fasilitas,
        },
        {
          path: 'akademik',
          name: 'akademik',
          component: Akademik,
        },
        {
          path: 'non_akademik',
          name: 'non_akademik',
          component: NonAkademik,
        },
      ]
    },
  ];