import { createStore } from 'redux';
import { Provider } from 'react-redux';
import cartReducer from './reducers/cartReducer';

const store = createStore(cartReducer);

const App = () => (
  <Provider store={store}>
    {/* Components */}
  </Provider>
);
export default store;
