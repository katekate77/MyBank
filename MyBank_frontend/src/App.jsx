import { BrowserRouter as Router, Routes, Route } from 'react-router-dom';
import ModuleList from './routes/modules/ModuleList';
import { Provider } from 'react-redux';
import { store } from './stores/Store';
import Homepage from './components/templates/Homepage';
import LoginForm from './components/molecules/LoginForm';

function App() {
  return (
    <Provider store={store}>
      <Router>
        <Routes>
          <Route path="/" element={<LoginForm />} />
          <Route path="/homepage" element={<Homepage />} />
        </Routes>
      </Router>
    </Provider>
  );
}

export default App;
