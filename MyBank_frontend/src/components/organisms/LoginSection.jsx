import LoginForm from '../molecules/LoginForm';

const LoginSection = () => {
  const handleLogin = (event, credentials) => {
    event.preventDefault();
    console.log('Logging in with:', credentials);
  };

  return (
    <div className="login-section">
      <h2>Welcome, please log in</h2>
      <LoginForm onSubmit={handleLogin} />
    </div>
  );
};

export default LoginSection;
