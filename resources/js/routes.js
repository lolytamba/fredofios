import App from './components/App'
import Home from './components/Home'
import Spa from './components/Spa'
import Base from './components/Base'
import Kontak from './components/Kontak'
import Artikel from './components/Artikel'
import Galeri from './components/Galeri'
import Staff from './components/Staff'
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
import AddTentang from './components/AddTentang'
import AddArtikel from './components/AddArtikel'
import middleware, { auth } from './middleware'

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
          beforeEnter: middleware([
            auth
          ]) 
        },
        {
          path: '/AddAkademik',
          name: 'AddAkademik',
          component: AddAkademik,
          beforeEnter: middleware([
            auth
          ])
        },
        {
          path: '/AddNonAkademik',
          name: 'AddNonAkademik',
          component: AddNonAkademik,
          beforeEnter: middleware([
            auth
          ])
        },
        {
          path: '/AddFasilitas',
          name: 'AddFasilitas',
          component: AddFasilitas,
          beforeEnter: middleware([
            auth
          ])
        },
        {
          path: '/AddStaff',
          name: 'AddStaff',
          component: AddStaff,
          beforeEnter: middleware([
            auth
          ])
        },
        {
          path: '/AddVisiMisi',
          name: 'AddVisiMisi',
          component: AddVisiMisi,
          beforeEnter: middleware([
            auth
          ])
        },
        {
          path: '/AddTentang',
          name: 'AddTentang',
          component: AddTentang,
          beforeEnter: middleware([
            auth
          ])
        },
        {
          path: '/AddArtikel',
          name: 'AddArtikel',
          component: AddArtikel,
          beforeEnter: middleware([
            auth
          ])
        }
      ]
    }
  ];
