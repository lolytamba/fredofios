import carouselService from '../../service/Carousel'

const state = {
  carousels: [],
  carousel: {
    gambar: '',
    judul: '',
  },
  loading: true,
  error: null
}

const mutations = {
  setSource(state, payload) {
    state.carousels = payload
    state.loading = false
    state.error = null
  },

  setFailedAction(state, payload) {
    state.loading = false
    state.error = payload.error
  },

  setCarouselForm(state, payload) {
    state.carousel.gambar = payload.gambar
    state.carousel.judul = payload.judul
  }
}

const getters = {
  error: state => state.error,
  loading: state => state.loading,
  carousel: state => state.carousel
}

const actions = {
  async get(context) {
    try {
      context.commit('setSource', await carouselService.get())
    } catch (err) {
      context.commit('setFailedAction', err)
    }
  },

  async store(context, payload) {
    try {
      await carouselService.store(payload)
    } catch (err) {
      context.commit('setFailedStore', err)
    }
  },

  async edit(context, id) {
    try {
      console.log(id)
      const res = await carouselService.find(id)
      context.commit('setCarouselForm', res)
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
      
      await carouselService.update(payload.id, data)
    } catch (err) {
      context.commit('setFailedAction', err)
    }
  },

  async delete (context, id) {
    try {
      await carouselService.delete(id)
    } catch (err) {
      context.commit('setFailedAction', err)
    }
  },

  resetForm(context) {
    context.commit('setCarouselForm', {})
  }
}

export default {
  namespaced: true,
  state,
  getters,
  actions,
  mutations
}