import http from './Http'

export default {
  async get () {
    try {
      const res = await http.get('/api/galeri')
      
      return res.data.data
    } catch (err) {
      throw new Error('Gagal mendapatkan data galeri!')
    }
  },

  async store (payload) {
    try {
      await http.post('/api/galeri', payload)
    } catch (err) {
      throw new Error('Gagal simpan galeri baru!')
    }
  },

  async find (id) {
    try {
      const res = await http.get(`/api/galeri/${id}`)
      console.log(res.data)
      return res.data.data[0]
    } catch (err) {
      throw new Error('Gagal mendapatkan data galeri!')
    }
  },

  async update (id, payload) {
    try {
      const res = await http.patch(`/api/galeri/${id}`, payload)

      return res.data
    } catch (err) {
      throw new Error('Gagal update data galeri!')
    }
  },

  async delete (id) {
    try {
      await http.delete(`/api/galeri/${id}`)
    } catch (err) {
      throw new Error('Gagal hapus data galeri')
    }
  }
}