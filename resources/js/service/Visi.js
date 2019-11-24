import http from './Http'

export default {
  async get () {
    try {
      const res = await http.get('/api/visi')
      
      return res.data.data
    } catch (err) {
      throw new Error('Gagal mendapatkan data visi!')
    }
  },

  async store (payload) {
    try {
      await http.post('/api/visi', payload)
    } catch (err) {
      throw new Error('Gagal simpan visi baru!')
    }
  },

  async find (id) {
    try {
      const res = await http.get(`/api/visi/${id}`)
      console.log(res.data.data[0])
      return res.data.data[0]
    } catch (err) {
      throw new Error('Gagal mendapatkan data visi!')
    }
  },

  async update (id, payload) {
    try {
      const res = await http.patch(`/api/visi/${id}`, payload)

      return res.data
    } catch (err) {
      throw new Error('Gagal update data visi!')
    }
  },

  async delete (id) {
    try {
      await http.delete(`/api/visi/${id}`)
    } catch (err) {
      throw new Error('Gagal hapus data visi')
    }
  }
}