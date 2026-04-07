const vueData = window.__PORTFOLIO_DATA__ || {};

Vue.createApp({
    data() {
        return {
            navItems: vueData.navItems || [],
            intro: vueData.intro || {},
            about: vueData.about || {},
            services: vueData.services || [],
            portfolioItems: vueData.portfolioItems || [],
            activeTab: 'skills',
        };
    },
}).mount('#app');
