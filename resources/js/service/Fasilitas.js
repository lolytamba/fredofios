import http from './Http'

export default {
  async get () {
    try {
      const res = await http.get('/api/fasilitas')
      
      return res.data.data
    } catch (err) {
      throw new Error('Gagal mendapatkan data fasilitas!')
    }
  },

  async store (payload) {
    try {
      await http.post('/api/fasilitas', payload)
    } catch (err) {
      throw new Error('Gagal simpan fasilitas baru!')
    }
  },

  async find (id) {
    try {
      const res = await http.get(`/api/fasilitas/${id}`)
      console.log(res.data.data[0])
      return res.data.data[0]
    } catch (err) {
      throw new Error('Gagal mendapatkan data fasilitas!')
    }
  },

  async update (id, payload) {
    try {
      const res = await http.post(`/api/fasilitas/${id}`, payload)

      return res.data
    } catch (err) {
      throw new Error('Gagal update data fasilitas!')
    }
  },

  async delete (id) {
    try {
      await http.delete(`/api/fasilitas/${id}`)
    } catch (err) {
      throw new Error('Gagal hapus data fasilitas')
    }
  }
}