import App from './components/App'
import Home from './components/Home'
import Spa from './components/Spa'
import Base from './components/Base'
import Kontak from './components/Kontak'
import Artikel from './components/Artikel'
import Galeri from './components/Galeri'
import Staff from './components/Staff'
import Berita from './components/Berita1'
import Berita2 from './components/Berita2'
import Berita3 from './components/Berita3'
import Fasilitas from './components/Fasilitas'
import Akademik from './components/Akademik'
import NonAkademik from './components/NonAkademik'
import VisiMisi from './components/VisiMisi'
import SpaAdmin from './components/SpaAdmin'
import AddGaleri from './components/AddGaleri'
import Login from './components/Login'
import AddAkademik from './components/AddAkademik'
import AddNonAkademik from './components/AddNonAkademik'
import AddFasilitas from './components/AddFasilitas'
import AddStaff from './components/AddStaff'
import AddVisiMisi from './components/AddVisiMisi'

export const routes = [
    {
      path: '/',
      name: 'base',
      component: Base,
    },
    {
      path: '/login',
      name: 'login',
      component: Login,
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
          path: 'artikel',
          name: 'artikel',
          component: Artikel,
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
          path: 'artikel/berita1',
          name: 'berita1',
          component: Berita,
        },
        {
          path: 'artikel/berita2',
          name: 'berita2',
          component: Berita2,
        },
        {
          path: 'artikel/berita3',
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
        {
          path: 'visi_misi',
          name: 'visi_misi',
          component: VisiMisi,
        },
      ]
    },
    {
      path: '/spaadmin',
      name: 'spaadmin',
      component: SpaAdmin,
      children: [
        {
          path: '/AddGaleri',
          name: 'AddGaleri',
          component: AddGaleri,
        },
        {
          path: '/AddAkademik',
          name: 'AddAkademik',
          component: AddAkademik,
        },
        {
          path: '/AddNonAkademik',
          name: 'AddNonAkademik',
          component: AddNonAkademik,
        },
        {
          path: '/AddFasilitas',
          name: 'AddFasilitas',
          component: AddFasilitas,
        },
        {
          path: '/AddStaff',
          name: 'AddStaff',
          component: AddStaff,
        },
        {
          path: '/AddVisiMisi',
          name: 'AddVisiMisi',
          component: AddVisiMisi,
        },
      ]
    }
  ];