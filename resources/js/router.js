
import Login from './views/Login'
import Register from './views/Register'
import Home from './views/Home'
import Dashboard from './views/LoginYogs'


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
    },
    {
        path: '/dashboard',
        name: 'dashboard',
        component: Dashboard
    }
]


