import http from './Http'

export default {
  async get () {
    try {
      const res = await http.get('/api/misi')
      
      return res.data.data
    } catch (err) {
      throw new Error('Gagal mendapatkan data misi!')
    }
  },

  async store (payload) {
    try {
      await http.post('/api/misi', payload)
    } catch (err) {
      throw new Error('Gagal simpan misi baru!')
    }
  },

  async find (id) {
    try {
      const res = await http.get(`/api/misi/${id}`)
      console.log(res.data.data[0])
      return res.data.data[0]
    } catch (err) {
      throw new Error('Gagal mendapatkan data misi!')
    }
  },

  async update (id, payload) {
    try {
      const res = await http.post(`/api/misi/${id}`, payload)

      return res.data
    } catch (err) {
      throw new Error('Gagal update data misi!')
    }
  },

  async delete (id) {
    try {
      await http.delete(`/api/misi/${id}`)
    } catch (err) {
      throw new Error('Gagal hapus data misi')
    }
  }
}