import http from './Http'

export default {
  async get () {
    try {
      const res = await http.get('/api/carousel')
      
      return res.data.data
    } catch (err) {
      throw new Error('Gagal mendapatkan data carousel!')
    }
  },

  async store (payload) {
    try {
      await http.post('/api/carousel', payload)
    } catch (err) {
      throw new Error('Gagal simpan carousel baru!')
    }
  },

  async find (id) {
    try {
      const res = await http.get(`/api/carousel/${id}`)
      console.log(res.data.data[0])
      return res.data.data[0]
    } catch (err) {
      throw new Error('Gagal mendapatkan data carousel!')
    }
  },

  async update (id, payload) {
    try {
      const res = await http.post(`/api/carousel/${id}`, payload)

      return res.data
    } catch (err) {
      throw new Error('Gagal update data carousel!')
    }
  },

  async delete (id) {
    try {
      await http.delete(`/api/carousel/${id}`)
    } catch (err) {
      throw new Error('Gagal hapus data carousel')
    }
  }
}