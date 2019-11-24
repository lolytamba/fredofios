import http from './Http'

export default {
  async get () {
    try {
      const res = await http.get('/api/nonakademik')
      
      return res.data.data
    } catch (err) {
      throw new Error('Gagal mendapatkan data non akademik!')
    }
  },

  async store (payload) {
    try {
      await http.post('/api/nonakademik', payload)
    } catch (err) {
      throw new Error('Gagal simpan non akademik baru!')
    }
  },

  async find (id) {
    try {
      const res = await http.get(`/api/nonakademik/${id}`)
      console.log(res.data.data[0])
      return res.data.data[0]
    } catch (err) {
      throw new Error('Gagal mendapatkan data non akademik!')
    }
  },

  async update (id, payload) {
    try {
      const res = await http.post(`/api/nonakademik/${id}`, payload)

      return res.data
    } catch (err) {
      throw new Error('Gagal update data non akademik!')
    }
  },

  async delete (id) {
    try {
      await http.delete(`/api/nonakademik/${id}`)
    } catch (err) {
      throw new Error('Gagal hapus data non akademik')
    }
  }
}