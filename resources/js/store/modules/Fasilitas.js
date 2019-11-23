import fasilitasService from '../../service/Fasilitas'

const state = {
  facilities: [],
  facility: {
    gambar_fasilitas: '',
    judul_fasilitas: '',
  },
  loading: true,
  error: null
}

const mutations = {
  setSource(state, payload) {
    state.facilities = payload
    state.loading = false
    state.error = null
  },

  setFailedAction(state, payload) {
    state.loading = false
    state.error = payload.error
  },

  setFacilityForm(state, payload) {
    state.facility.gambar_fasilitas = payload.gambar
    state.facility.judul_fasilitas = payload.judul
  }
}

const getters = {
  error: state => state.error,
  loading: state => state.loading,
  facility: state => state.facility
}

const actions = {
  async get(context) {
    try {
      context.commit('setSource', await fasilitasService.get())
    } catch (err) {
      context.commit('setFailedAction', err)
    }
  },

  async store(context, payload) {
    try {
      await fasilitasService.store(payload)
    } catch (err) {
      context.commit('setFailedStore', err)
    }
  },

  async edit(context, id) {
    try {
      console.log(id)
      const res = await fasilitasService.find(id)
      context.commit('setFacilityForm', res)
    } catch (err) {
      context.commit('setFailedAction', err)
    }
  },

  async update(context, payload) {
    try {
      let data = new FormData();
      data.append('gambar', payload.gambar)
      data.append('judul', payload.judul)

      console.log(data)
      
      await fasilitasService.update(payload.id, data)
    } catch (err) {
      context.commit('setFailedAction', err)
    }
  },

  async delete (context, id) {
    try {
      await fasilitasService.delete(id)
    } catch (err) {
      context.commit('setFailedAction', err)
    }
  },

  resetForm(context) {
    context.commit('setFacilityForm', {})
  }
}

export default {
  namespaced: true,
  state,
  getters,
  actions,
  mutations
}