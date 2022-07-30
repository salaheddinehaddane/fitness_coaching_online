import Accueille from "./components/coach-accueille";
import Entrainement from "./components/coach-entrainement";
import Nutrition from "./components/coach-nutrition";
import Clients from "./components/coach-client";
import Entrainementcl from "./components/client-entrainement";
import Accueillecl from "./components/client-accueille";
import Nutritioncl from "./components/client-nutrition";
import Hebdo from "./components/client-hebdo";
import AccueilleAd from "./components/admin-accueille"
import AdminClient from "./components/admin-client"
import AdminCoach from "./components/admin-coach"
import AdminPending from "./components/admin-pending"
import Login from "./components/login"
import Inscrire from "./components/inscrire"
import Renouveler from "./components/renouveler"
import CoacheMe from "./components/coach_me"
import CoachCoaching from "./components/coach-demande"
import MotPasse from "./components/mot_passe_oublie"
import changeMotPasse from "./components/changer-mot-passe"
export default {
    mode: 'history',
    routes: [{
            path: '/coach/accueille',
            component: Accueille
        },
        {
            path: '/coach/coach-entrainement',
            component: Entrainement
        },
        {
            path: '/coach/coach-nutrition',
            component: Nutrition
        },
        {
            path: '/coach/coach-clients',
            component: Clients
        },
        {
            path: '/client/client-accueille',
            component: Accueillecl
        },
        {
            path: '/client/client-entrainement',
            component: Entrainementcl
        },
        {
            path: '/client/client-nutrition',
            component: Nutritioncl
        },
        {
            path: '/client/client-hebdo',
            component: Hebdo
        },
        {
            path: '/admin/admin-accueille',
            component: AccueilleAd
        },
        {
            path: '/admin/admin-coach',
            component: AdminCoach
        },
        {
            path: '/admin/admin-client',
            component: AdminClient
        },
        {
            path: '/admin/admin-pending',
            component: AdminPending
        },
        {
            path: '/',
            component: Login
        },
        {
            path: '/inscrire',
            component: Inscrire
        },
        {
            path: '/renouveler',
            component: Renouveler
        },
        {
            path: '/invitation/:id',
            component: CoacheMe
        },
        {
            path: '/coach/coach-coaching',
            component: CoachCoaching
        },
        {
            path: '/motpasseoublie',
            component: MotPasse
        },
        {
            path: '/coach/coach-motpasse',
            component: changeMotPasse
        },
        {
            path: '/client/client-motpasse',
            component: changeMotPasse
        },
    ]
}