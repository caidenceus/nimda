const Subject = ({ title, subtitle }) => {
  return (
    <div
      style={{
        gridColumn: 'span 1',
        gridRow: 'span 1',

        display: 'flex',
        flexDirection: 'column',
        justifyContent: 'space-evenly',

        border: '1px solid #333',
        padding: '0 20px'
      }}
    >
      <h2>{ title }</h2>
      <p>{ subtitle }</p>
    </div>
  );
};


const Dashboard = () => {
  const subjects = [
    {
      title: 'Calculus I',
      subtitle: 'Basic limits and derivatives'
    },
    {
      title: 'Calculus II',
      subtitle: 'Integrals and antiderivatives'
    },
    {
      title: 'Calculus III',
      subtitle: 'Calculus derivatives and integrals in 3D'
    },
    {
      title: 'Number Theory',
      subtitle: 'Theory of the integers'
    },
    {
      title: 'Linear Algebra',
      subtitle: 'Algebra of Matricies'
    }
  ];

  return (
    <div
      style={{
        display: 'grid',
        gridTemplateColumns:
        'repeat(3, 1fr)',
        gridAutoRows: '100px',
        gap: '20px'
      }}>
      <Subject title="Calculus 1" subtitle="Basic limits and derivatives" />
      <Subject title="Calculus 2" subtitle="Integrals and antiderivatives" />
      <Subject title="Calculus 3" subtitle="Calculus derivatives and integrals in 3D" />
      <Subject title="Number Theory" subtitle="Theory of the integers" />
      <Subject title="Linear Algebra" subtitle="Algebra of Matricies" />
    </div>
  );
};

export default Dashboard;