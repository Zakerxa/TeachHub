export default {
    state() {
        return {
            phone: '+959962330407'
        }
    },
    getters: {
        phoneNumber(state) {
            return state.phone
        }
    },
    actions: {
        openInFacebookApp({ state, commit, rootState }) {
            var fbPageURL = "https://www.facebook.com/profile.php?id=61554458446614";
            // Check if the user is on a mobile device
            if (/Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent)) {
                // Attempt to open in the Facebook app
                window.location.href = "intent://page/" + fbPageURL.substr(fbPageURL.lastIndexOf('/') + 1) + "#Intent;package=com.facebook.katana;scheme=https;end";
            } else {
                // If not on a mobile device, open in the default browser
                window.open(fbPageURL, "_blank");
            }
        },
        openInTelegram({ state, commit, rootState }) {
            window.location.href = "https://t.me/share/url?url=tel:" + state.phone;
        },
        openInWhatsApp({ state, commit, rootState }) {
            window.location.href = "https://wa.me/" + state.phone;
            // window.open('https://api.whatsapp.com/send?phone=+959962330407', '_blank');
        },
        openInPhone({ state, commit, rootState }) {
            window.location.href = `tel:${state.phone}`;
        }
    }
}