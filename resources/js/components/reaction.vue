<template>
    <div class="reactions-container bg-light">

        <div v-show="mouseEmojiIcon" @mouseleave="leaveEmojiIcon()" @mouseover="hoverEmojiIcon()"
            :class="{ active: isActive }" :style="reactionButtonStyle" class="reaction-button">
            <button v-for="(reaction, index) in reactions" :key="index" @click="react(index)" class="emoji-button"
                :class="{ 'animated-reaction': isActive && activeReactionIndex === index }">
                {{ reaction }}
            </button>
        </div>

        <div @click="toggleEmojiPicker">{{ msg }}</div>
    </div>
</template>

<script>
export default {
    props: ['msg'],
    data() {
        return {
            isActive: false,
            reactions: ['👍', '👎', '😍', '😆', '😮'],
            reactionsCount: 0,
            activeReactionIndex: -1,
            mouseEmojiIcon: false,
            mouseEmojiBtn: false
        };
    },
    computed: {
        reactionButtonStyle() {
            return this.mouseEmojiIcon ? { transform: 'scale(1.1)' } : {};
        },
    },
    methods: {
        hoverEmojiBtn() {
            this.mouseEmojiBtn = true
            this.mouseEmojiIcon = true;
        },
        hoverEmojiIcon() {
            this.mouseEmojiBtn = true
            this.mouseEmojiIcon = true
        },
        leaveEmojiIcon() {
            setTimeout(() => this.mouseEmojiIcon = false, 200);
        },
        leaveEmojiBtn() {
            this.mouseEmojiIcon = false,
                setTimeout(() => this.mouseEmojiBtn = false, 200);
        },
        toggleEmojiPicker() {
            this.mouseEmojiIcon = !this.mouseEmojiIcon;
            if (!this.mouseEmojiIcon) {
                // Reset animation state when hiding the emoji picker
                this.isActive = false;
                this.activeReactionIndex = -1;
            }
        },
        react(index) {
            this.reactionsCount++;
            this.activeReactionIndex = index;
            this.isActive = true;
            setTimeout(() => {
                this.isActive = false;
                this.activeReactionIndex = -1;
                this.showEmojiPicker = false; // Close emoji picker after reacting
                this.mouseEmojiBtn = false;
                this.mouseEmojiIcon = false;
            }, 400); // Adjust the duration based on your preference
        },
    },
};
</script>

<style scoped lang="scss">
.reactions-container {
    position: relative;
    margin-bottom: 10px;
    width: 100%;
}

.reaction-button {
    position: absolute;
    top: -30px;
    left: 5%;
    display: flex;
    transform: scale(1);
    transition: transform 0.1s ease-in-out;
}

.emoji-button {
    cursor: pointer;
    border: none;
    background: none;
    font-size: 1.5rem;
    outline: none;
    transition: transform 0.2s ease-in-out;
}

.emoji-button:hover {
    transform: scale(1.2);
}

.active {
    color: #ff6347;
}

.animated-reaction {
    animation: reactionAnimation 1s ease-out;
}

@keyframes reactionAnimation {
    0% {
        transform: scale(1);
    }

    50% {
        transform: scale(1.5);
    }

    100% {
        transform: scale(1);
    }
}
</style>
