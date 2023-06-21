import LeftSidebar from './components/common/LeftSidebar.js';


function App() {
  return (
    <div id="app" style={{ display: 'flex', height: '100%' }}>
      <LeftSidebar />
      <main className="content" style={{ width: "100%" }}>
      </main>
    </div>
  );
}

export default App;
