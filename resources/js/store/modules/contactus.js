export default {
    state() {
        return {
            phone: '+959777637858'
        }
    },
    actions: {
        openInFacebookApp({ state, commit, rootState }) {
            var fbPageID = '61554458446614';
            var fbAppURL = "fb://page/" + fbPageID;
            // Check if the user is on a mobile device
            if (/Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent)) {
                try {
                    window.location.href = "https://www.facebook.com/profile.php?id=" + fbPageID;
                } catch (error) {
                    window.location.href = "intent://page/" + fbPageURL.substr(fbPageURL.lastIndexOf('/') + 1) + "#Intent;package=com.facebook.katana;scheme=https;end";
                }
            } else window.location.href = "https://www.facebook.com/profile.php?id=" + fbPageID;

        },
        openInTelegram({ state, commit, rootState }) {
            window.location.href = "https://t.me/" + encodeURIComponent(state.phone);
        },
        openInWhatsApp({ state, commit, rootState }) {
            window.location.href = "https://wa.me/" + encodeURIComponent(state.phone);
            // window.open(`https://api.whatsapp.com/send?phone=${encodeURIComponent(state.phone)}`, '_blank');
        },
        openInPhone({ state, commit, rootState }) {
            window.location.href = `tel:${state.phone}`;
        }
    }
}