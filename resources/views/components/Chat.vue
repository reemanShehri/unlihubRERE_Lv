<template>
  <div>
    <div id="chat-box">
      <div v-for="(msg, index) in messages" :key="index">
        <strong>{{ msg.sender }}:</strong> {{ msg.text }}
      </div>
    </div>
    <input v-model="userInput" @keyup.enter="sendMessage" placeholder="Type your message...">
    <button @click="sendMessage">Send</button>
  </div>
</template>

<script>
export default {
  data() {
    return {
      messages: [],
      userInput: ''
    };
  },
  methods: {
    async sendMessage() {
      if (!this.userInput) return;
      
      this.messages.push({ sender: 'You', text: this.userInput });
      const question = this.userInput;
      this.userInput = '';

      try {
        const response = await axios.post('/api/ask', { question });
        this.messages.push({ sender: 'AI', text: response.data.answer });
      } catch (error) {
        this.messages.push({ sender: 'Error', text: error.message });
      }
    }
  }
};
</script>