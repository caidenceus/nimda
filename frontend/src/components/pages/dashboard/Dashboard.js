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
      id: 1,
      title: 'Calculus I',
      subtitle: 'Basic limits and derivatives'
    },
    {
      id: 2,
      title: 'Calculus II',
      subtitle: 'Integrals and antiderivatives'
    },
    {
      id: 3,
      title: 'Calculus III',
      subtitle: 'Calculus derivatives and integrals in 3D'
    },
    {
      id: 4,
      title: 'Number Theory',
      subtitle: 'Theory of the integers'
    },
    {
      id: 5,
      title: 'Linear Algebra',
      subtitle: 'Algebra of Matricies'
    }
  ];

  return (
    <div
      style={{
        display: 'grid',
        gridTemplateColumns: 'repeat(3, 1fr)',
        gridAutoRows: '100px',
        gap: '20px'
      }}>

        {subjects.map((subject) => {
          return <Subject title={subject.title} subtitle={subject.subtitle} key={subject.id} />
        })}

    </div>
  );
};

export default Dashboard;