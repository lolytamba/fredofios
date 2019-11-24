import http from './Http'

export default {
  async get () {
    try {
      const res = await http.get('/api/tentang')
      
      return res.data.data
    } catch (err) {
      throw new Error('Gagal mendapatkan data tentang!')
    }
  },

  async store (payload) {
    try {
      await http.post('/api/tentang', payload)
    } catch (err) {
      throw new Error('Gagal simpan tentang baru!')
    }
  },

  async find (id) {
    try {
      const res = await http.get(`/api/tentang/${id}`)
      console.log(res.data.data[0])
      return res.data.data[0]
    } catch (err) {
      throw new Error('Gagal mendapatkan data tentang!')
    }
  },

  async update (id, payload) {
    try {
      const res = await http.patch(`/api/tentang/${id}`, payload)

      return res.data
    } catch (err) {
      throw new Error('Gagal update data tentang!')
    }
  },

  async delete (id) {
    try {
      await http.delete(`/api/tentang/${id}`)
    } catch (err) {
      throw new Error('Gagal hapus data tentang')
    }
  }
}