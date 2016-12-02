<template>
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Example Component</div>

                    <div class="panel-body">
                        <select v-model="selected" v-on:change="changeSelected">
                          <option v-for="user in users" v-bind:value="user.id">
                            {{ user.name }}
                          </option>
                        </select>
                        <input class="form-control" name="text" v-model="text"></input>
                        <button class="btn btn-default" v-on:click="submitMessage">Submit</button>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <ul>
                    <li v-for="message in messages">
                        {{ message.created_at }} {{ message.text }} - {{ message.sender.name }} -> {{ message.receiver.name }}
                    </li>
                </ul>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        mounted() {
            console.log('Component mounted.')

            this.$http.get('/api/users').then((response) => {
                console.log(response)
                this.users = response.body
                this.selected = this.users[0].id

                if (this.users.length > 0) {
                    this.$http.get('/api/messages/with/' + this.users[0].id)
                        .then((response) => {
                            console.log(response)
                            this.messages = response.body
                        })
                }
            })

        },
        data() {
            return {
                selected: '',
                options: [],
                text: '',
                messages: []
            }
        },
        methods: {
            submitMessage(e) {
                console.log('Submit a message')
                console.log(this.text)

                if (!this.text) {
                    return
                }

                this.$http.post('/api/messages/to/' + this.selected, {
                    text: this.text
                }).then((response) => {
                    console.log(response)
                    this.text = ''
                    this.$http.get('/api/messages/with/' + this.selected)
                        .then((response) => {
                            console.log(response)
                            this.messages = response.body
                        })
                }, (response) => {
                    console.log(response)
                })
            },
            changeSelected(e) {
                console.log('Change selected', this.selected)
                this.$http.get('/api/messages/with/' + this.selected)
                    .then((response) => {
                        console.log(response)
                        this.messages = response.body
                    })
            }
        }
    }
</script>
