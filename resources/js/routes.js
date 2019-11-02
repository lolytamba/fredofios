import App from './components/App'
import Home from './components/Home'
import Spa from './components/Spa'
import Base from './components/Base'
import Kontak from './components/Kontak'
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
        }
      ]
    },
  ];