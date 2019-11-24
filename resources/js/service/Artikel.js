import http from './Http'

export default {
  async get () {
    try {
      const res = await http.get('/api/artikel')
      
      return res.data.data
    } catch (err) {
      throw new Error('Gagal mendapatkan data artikel!')
    }
  },

  async store (payload) {
    try {
      await http.post('/api/artikel', payload)
    } catch (err) {
      throw new Error('Gagal simpan artikel baru!')
    }
  },

  async find (id) {
    try {
      const res = await http.get(`/api/artikel/${id}`)
      console.log(res.data.data[0])
      return res.data.data[0]
    } catch (err) {
      throw new Error('Gagal mendapatkan data artikel!')
    }
  },

  async update (id, payload) {
    try {
      const res = await http.post(`/api/artikel/${id}`, payload)

      return res.data
    } catch (err) {
      throw new Error('Gagal update data artikel!')
    }
  },

  async delete (id) {
    try {
      await http.delete(`/api/artikel/${id}`)
    } catch (err) {
      throw new Error('Gagal hapus data artikel')
    }
  }
}