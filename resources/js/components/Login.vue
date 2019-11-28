<template>
  <v-app id="inspire">
    <v-content>
      <v-container
        class="fill-height"
        fluid
      >
        <v-row
          align="center"
          justify="center"
        >
          <v-col
            cols="12"
            sm="8"
            md="4"
          >
            <v-card class="elevation-12">
              <v-toolbar
                color="blue lighten-1"
                dark
                flat
              >
                <v-toolbar-title>Silahkan Login</v-toolbar-title>
                <v-spacer />
              </v-toolbar>
              <v-card-text>
                <v-form>
                  <v-text-field
                    label="email"
                    name="email"
                    prepend-icon="person"
                    type="text"
                    v-model="email"
                    :error-messages="emailRules"
                    @input="$v.email.$touch()"
                    @blur="$v.email.$touch()"
                  />

                  <v-text-field
                    id="password"
                    label="Password"
                    name="password"
                    prepend-icon="lock"
                    type="password"
                    v-model="password"
                    :error-messages="passwordRules"
                    @input="$v.password.$touch()"
                    @blur="$v.password.$touch()"
                  />
                </v-form>
              </v-card-text>
              <v-card-actions>
                <v-spacer />
                <v-btn color="blue lighten-1" @click="login">Login</v-btn>
              </v-card-actions>
            </v-card>
          </v-col>
        </v-row>
      </v-container>
    </v-content>
  </v-app>
</template>

<script>
import { required, maxLength, minLength, numeric, email } from 'vuelidate/lib/validators'
import { mapGetters, mapState, mapActions } from 'vuex'

  export default {
    data () {
      return {
        email: '',
        password: ''
      }
    },

    validations: {
      password: { required },
      email: { required, email }
    },

    props: {
      source: String,
    },

    computed: {
      passwordRules () {
        const errors = []
        if (!this.$v.password.$dirty) return errors         
        !this.$v.password.required && errors.push('Password tidak boleh kosong.')
        return errors
      },

      emailRules(){
        const errors = []
        if (!this.$v.email.$dirty) return errors
        !this.$v.email.email && errors.push('Email harus valid')
        !this.$v.email.required && errors.push('Email tidak boleh kosong')
        return errors
      },

      ...mapState({
          loading: state => state.Token.loading,
          error: state => state.Token.error,
          token: state => state.Token.token,
        }),
    },

    methods: {
      ...mapActions({
        retrieveToken: 'Token/retrieveToken',
      }),
      
      async login(){
        const payload = {
          email: this.email,
          password: this.password
        }
          await this.retrieveToken(payload)
          this.$router.push({ name : 'AddGaleri' })
      }
    },
  }
</script>