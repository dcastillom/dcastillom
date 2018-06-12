import Promise from 'bluebird'
import contents from  '../contents'
import literals from '../common/literals/index'

const bootApp = () => {
  return new Promise(resolve => {
    const preloads = [
      literals(),
      contents.getContents()
    ]
    Promise.all(preloads).then(() => resolve())
  })
}

export default bootApp