import http from './Http'

export default {
  async get () {
    try {
      const res = await http.get('/api/staff')
      
      return res.data.data
    } catch (err) {
      throw new Error('Gagal mendapatkan data staff!')
    }
  },

  async store (payload) {
    try {
      await http.post('/api/staff', payload)
    } catch (err) {
      throw new Error('Gagal simpan staff baru!')
    }
  },

  async find (id) {
    try {
      const res = await http.get(`/api/staff/${id}`)
      console.log(res.data.data[0])
      return res.data.data[0]
    } catch (err) {
      throw new Error('Gagal mendapatkan data staff!')
    }
  },

  async update (id, payload) {
    try {
      const res = await http.post(`/api/staff/${id}`, payload)

      return res.data
    } catch (err) {
      throw new Error('Gagal update data staff!')
    }
  },

  async delete (id) {
    try {
      await http.delete(`/api/staff/${id}`)
    } catch (err) {
      throw new Error('Gagal hapus data staff')
    }
  }
}