import http from './Http'

export default {
  async store (payload) {
    try {
      await http.post('/api/kontakform', payload)
    } catch (err) {
      throw new Error('Gagal mengirim pesan!')
    }
  },
}