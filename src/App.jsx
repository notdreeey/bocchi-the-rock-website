import { Navigate, Route, Routes } from "react-router-dom";
import { useEffect, useState } from "react";
import Layout from "./components/Layout";
import HomePage from "./pages/HomePage";
import CharactersPage from "./pages/CharactersPage";
import CharacterDetailsPage from "./pages/CharacterDetailsPage";
import CharacterFormPage from "./pages/CharacterFormPage";
import { initialCharacters } from "./data/characters";
import NotFoundPage from "./pages/NotFoundPage";

const STORAGE_KEY = "bocchi-characters-v1";

export default function App() {
  const [characters, setCharacters] = useState(() => {
    try {
      const saved = localStorage.getItem(STORAGE_KEY);
      return saved ? JSON.parse(saved) : initialCharacters;
    } catch {
      return initialCharacters;
    }
  });
  const [search, setSearch] = useState("");

  useEffect(() => {
    localStorage.setItem(STORAGE_KEY, JSON.stringify(characters));
  }, [characters]);

  const saveCharacter = (character) => {
    if (character.id) {
      setCharacters((prev) =>
        prev.map((item) => (item.id === character.id ? { ...item, ...character } : item))
      );
      return;
    }

    setCharacters((prev) => [
      ...prev,
      {
        ...character,
        id: String(Date.now()),
      },
    ]);
  };

  const deleteCharacter = (id) => {
    setCharacters((prev) => prev.filter((item) => item.id !== id));
  };

  return (
    <Layout>
      <Routes>
        <Route path="/" element={<HomePage />} />
        <Route
          path="/characters"
          element={
            <CharactersPage
              characters={characters}
              search={search}
              setSearch={setSearch}
              onDelete={deleteCharacter}
            />
          }
        />
        <Route path="/characters/new" element={<CharacterFormPage characters={characters} onSave={saveCharacter} />} />
        <Route path="/characters/:id/edit" element={<CharacterFormPage characters={characters} onSave={saveCharacter} />} />
        <Route path="/characters/:id" element={<CharacterDetailsPage characters={characters} />} />
        <Route path="/404" element={<NotFoundPage />} />
        <Route path="*" element={<Navigate to="/404" replace />} />
      </Routes>
    </Layout>
  );
}
