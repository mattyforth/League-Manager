
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

const app = new Vue({
    el: '#app',
    data: {
        gameTableOptions: {
            dom: "<'float-left' f>",
            lengthChange: false,
            paging: false
        },
        game: {
            home_team: "",
            away_team: "",
            home_players: [],
            away_players: []
        }
    },
    mounted() {
        let self = this;
        
        $(".table:not(.game-table)").DataTable();

        $(".game-table").DataTable(self.gameTableOptions);
    },
    methods: {
        getHomeTeamPlayers() {
            let self = this;

            axios.get("/api/v1/players/team/" + self.game.home_team)
                .then(function(response) {
                    if (response.data.players) {
                        $("#home-table").DataTable().destroy();

                        self.game.home_players = response.data.players;

                        self.$nextTick(function() {
                            $("#home-table").DataTable(self.gameTableOptions);
                        });
                    }
                });
        },
        getAwayTeamPlayers() {
            let self = this;

            axios.get("/api/v1/players/team/" + self.game.away_team)
                .then(function(response) {
                    if (response.data.players) {
                        $("#away-table").DataTable().destroy();

                        self.game.away_players = response.data.players;
                        console.log(response);

                        self.$nextTick(function() {
                            $("#away-table").DataTable(self.gameTableOptions);
                        });
                    }
                });
        }
    }
});
