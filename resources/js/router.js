import Login from './views/Login'
import Register from './views/Register'
import Home from './views/Home'


export const routes =[
    {
        path: '/login',
        name: 'login',
        component: Login
    },
    {
        path: '/register',
        name: 'register',
        component: Register
    },
    {
        path: '/',
        name: 'home',
        component: Home
    }
]

