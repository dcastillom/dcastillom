import Promise from 'bluebird'
import literals from '../common/literals/index'

const bootApp = () => {
  return new Promise(resolve => {
    const preloads = [
      literals()
    ]
    Promise.all(preloads).then(() => resolve())
  })
}

export default bootApp