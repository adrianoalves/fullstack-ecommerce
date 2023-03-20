import {Loading, QSpinnerHourglass} from "quasar"
import {ref} from 'vue'

function loading(show, message) {

  message = message || 'Aguarde, buscando informações...'
  if( show ) {
    Loading.show({
      message, spinner: QSpinnerHourglass
    })
  }
  else {
    Loading.hide()
  }
}

export { loading }
