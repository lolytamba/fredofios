import http from './Http'

export default {
  async get () {
    try {
      const res = await http.get('/api/akademik')
      
      return res.data.data
    } catch (err) {
      throw new Error('Gagal mendapatkan data akademik!')
    }
  },

  async store (payload) {
    try {
      await http.post('/api/akademik', payload)
    } catch (err) {
      throw new Error('Gagal simpan akademik baru!')
    }
  },

  async find (id) {
    try {
      const res = await http.get(`/api/akademik/${id}`)
      console.log(res.data.data[0])
      return res.data.data[0]
    } catch (err) {
      throw new Error('Gagal mendapatkan data akademik!')
    }
  },

  async update (id, payload) {
    try {
      const res = await http.post(`/api/akademik/${id}`, payload)

      return res.data
    } catch (err) {
      throw new Error('Gagal update data akademik!')
    }
  },

  async delete (id) {
    try {
      await http.delete(`/api/akademik/${id}`)
    } catch (err) {
      throw new Error('Gagal hapus data akademik')
    }
  }
}